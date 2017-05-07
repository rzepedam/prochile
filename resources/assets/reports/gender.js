$(document).ready(function() {
    var ctx = document.getElementById("gender");
    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: {
            labels: ["Red", "Blue", "Yellow"],
            datasets: [{
                data: [150, 20, 80],
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

