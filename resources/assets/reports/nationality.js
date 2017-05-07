$(document).ready(function() {
    var ctx = document.getElementById("nationality");
    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: {
            labels: ["Red", "Blue", "Yellow"],
            datasets: [{
                data: [300, 50, 100],
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
            }]
        },
    });
});
