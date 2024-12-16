jQuery(document).ready(function ($) {
    $('#calculate-emi').on('click', function () {
        const loanAmount = parseFloat($('#loan-amount').val());
        const interestRate = parseFloat($('#interest-rate').val()) / 12 / 100;
        const loanTenure = parseFloat($('#loan-tenure').val()) * 12;

        if (loanAmount && interestRate && loanTenure) {
            const emi = (loanAmount * interestRate * Math.pow(1 + interestRate, loanTenure)) /
                        (Math.pow(1 + interestRate, loanTenure) - 1);
            $('#emi-result').html(`<h4>Monthly EMI: ${emi.toFixed(2)}</h4>`);
        } else {
            $('#emi-result').html('<h4>Please enter all fields correctly.</h4>');
        }
    });
});
