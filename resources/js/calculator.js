/**
 * Earnings calculator.
 *
 * The user enters the fees and split they currently pay at their existing
 * brokerage (numbers only the agent can confirm) and we compare their
 * annual take-home against Taylor's flat $99/month structure. No claims
 * are made about specific competitors - the agent is the source of truth.
 */
const TAYLOR_MONTHLY = 99;

export const calculator = (config = {}) => ({
    salePrice: config.salePrice ?? 450000,
    commissionPct: config.commissionPct ?? 2.5,
    closings: config.closings ?? 10,

    currentMonthly: config.currentMonthly ?? 175,
    currentTransactionFee: config.currentTransactionFee ?? 395,
    currentSplitPct: config.currentSplitPct ?? 70,
    currentFranchisePct: config.currentFranchisePct ?? 0,
    currentSplitCap: config.currentSplitCap ?? 0,

    get grossPerDeal() {
        return this.salePrice * (this.commissionPct / 100);
    },

    get grossAnnual() {
        return this.grossPerDeal * this.closings;
    },

    get taylorAnnual() {
        return this.grossAnnual - (TAYLOR_MONTHLY * 12);
    },

    get currentAnnual() {
        const splitToBrokeragePct = Math.max(0, 1 - (this.currentSplitPct / 100));
        const franchisePct = Math.max(0, this.currentFranchisePct / 100);
        const cap = Number(this.currentSplitCap) || 0;

        let agentKept = 0;
        let collectedSplit = 0;

        for (let i = 0; i < this.closings; i++) {
            const gross = this.grossPerDeal;
            const franchiseFee = gross * franchisePct;
            const postFranchise = gross - franchiseFee;

            let toBrokerage = postFranchise * splitToBrokeragePct;
            if (cap > 0 && collectedSplit + toBrokerage > cap) {
                toBrokerage = Math.max(0, cap - collectedSplit);
            }
            collectedSplit += toBrokerage;

            agentKept += postFranchise - toBrokerage - this.currentTransactionFee;
        }

        return agentKept - (this.currentMonthly * 12);
    },

    get savings() {
        return Math.max(0, this.taylorAnnual - this.currentAnnual);
    },

    get savingsPct() {
        if (this.currentAnnual <= 0) return 0;
        return Math.round(((this.taylorAnnual - this.currentAnnual) / this.currentAnnual) * 100);
    },

    money(n) {
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 0 }).format(Math.round(n));
    },
});
