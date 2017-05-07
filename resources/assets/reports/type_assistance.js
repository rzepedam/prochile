$(document).ready(function() {
    var ctx = document.getElementById("type_assistance");
    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: {
            labels: ["Red", "Blue", "Yellow"],
            datasets: [{
                data: [50, 100, 180],
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

