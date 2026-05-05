/**
 * Earnings calculator.
 *
 * Models annual take-home for a real estate agent at Taylor vs major
 * competitors using publicly published fee structures (sourced 2025/2026).
 * Numbers are conservative estimates - the calculator is meant for
 * relative comparison, not formal financial advice.
 */
export const calculator = (config = {}) => ({
    salePrice: config.salePrice ?? 450000,
    commissionPct: config.commissionPct ?? 2.5,
    closings: config.closings ?? 10,
    competitor: config.competitor ?? 'samson',

    competitors: {
        samson: { label: 'Samson Properties', monthly: 99, transactionFee: 495, brokerageFee: 0, capTransactions: 8, postCapTransactionFee: 0, splitPct: 100 },
        kw: { label: 'Keller Williams', monthly: 175, transactionFee: 0, brokerageFee: 0, splitPct: 64, capDollars: 35000, franchiseFeePct: 6, franchiseFeeCap: 3000 },
        compass: { label: 'Compass', monthly: 0, transactionFee: 0, brokerageFee: 0, splitPct: 80 },
        douglas: { label: 'Douglas Realty', monthly: 99, transactionFee: 0, brokerageFee: 0, splitPct: 100 },
    },

    get grossPerDeal() {
        return this.salePrice * (this.commissionPct / 100);
    },

    get grossAnnual() {
        return this.grossPerDeal * this.closings;
    },

    get taylorAnnual() {
        return this.grossAnnual - (79 * 12);
    },

    get competitorAnnual() {
        const c = this.competitors[this.competitor];
        if (!c) return 0;

        if (this.competitor === 'kw') {
            let agentKept = 0;
            let mcCollected = 0;
            const splitToMc = 1 - (c.splitPct / 100);
            for (let i = 0; i < this.closings; i++) {
                const gross = this.grossPerDeal;
                let toMc = gross * splitToMc;
                if (mcCollected + toMc > c.capDollars) {
                    toMc = Math.max(0, c.capDollars - mcCollected);
                }
                mcCollected += toMc;
                agentKept += gross - toMc;
            }
            const franchiseFee = Math.min(this.grossAnnual * (c.franchiseFeePct / 100), c.franchiseFeeCap);
            return agentKept - franchiseFee - (c.monthly * 12);
        }

        if (this.competitor === 'samson') {
            const billableTransactionFees = c.transactionFee * Math.min(this.closings, c.capTransactions);
            return this.grossAnnual - billableTransactionFees - (c.monthly * 12);
        }

        const splitKept = c.splitPct / 100;
        return (this.grossAnnual * splitKept) - (c.monthly * 12) - (c.transactionFee * this.closings);
    },

    get savings() {
        return Math.max(0, this.taylorAnnual - this.competitorAnnual);
    },

    get savingsPct() {
        if (this.competitorAnnual <= 0) return 0;
        return Math.round(((this.taylorAnnual - this.competitorAnnual) / this.competitorAnnual) * 100);
    },

    money(n) {
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 0 }).format(Math.round(n));
    },
});
