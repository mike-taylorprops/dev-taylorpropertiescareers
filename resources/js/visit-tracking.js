// Marketing-email visitor tracking. When a visitor arrives from a tracked
// email link (?mkt_id=...&mkt_b=... — the Mailchimp unique member id, never
// an email address), store the attribution in a long-lived first-party
// cookie and beacon every page view (landing, subsequent, and return
// visits) to the backend, which forwards it to the portal.

const COOKIE_NAME = 'mkt_attr';
const COOKIE_DAYS = 90;

const readCookie = () => {
    const match = document.cookie.match(new RegExp('(?:^|; )' + COOKIE_NAME + '=([^;]*)'));

    try {
        return match ? JSON.parse(decodeURIComponent(match[1])) : null;
    } catch {
        return null;
    }
};

const writeCookie = (data) => {
    const secure = location.protocol === 'https:' ? '; Secure' : '';

    document.cookie = COOKIE_NAME + '=' + encodeURIComponent(JSON.stringify(data))
        + '; Max-Age=' + COOKIE_DAYS * 86400 + '; Path=/; SameSite=Lax' + secure;
};

export const initVisitTracking = () => {
    const params = new URLSearchParams(location.search);
    const mailchimpId = params.get('mkt_id');
    const batch = params.get('mkt_b');

    let attribution = readCookie();

    if (mailchimpId && batch) {
        attribution = {
            id: mailchimpId,
            b: batch,
            vid: attribution?.vid || crypto.randomUUID(),
            ts: Date.now(),
        };
        writeCookie(attribution);

        // Strip the params so copied/shared URLs don't re-attribute.
        params.delete('mkt_id');
        params.delete('mkt_b');
        const query = params.toString();
        history.replaceState(null, '', location.pathname + (query ? '?' + query : '') + location.hash);
    }

    if (!attribution || !attribution.id) {
        return;
    }

    fetch('/track-visit', {
        method: 'POST',
        keepalive: true,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
            'Accept': 'application/json',
        },
        body: JSON.stringify({
            mailchimp_unique_id: attribution.id,
            batch_id: attribution.b,
            visitor_id: attribution.vid,
            page_url: location.href,
            referrer: document.referrer || null,
        }),
    }).catch(() => {});
};
