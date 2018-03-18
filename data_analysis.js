new Chart(document.getElementById("radar-chart"), {
    type: 'radar',
    data: {
        labels: ["Anger", "Joy","Sadness","Fear","Disgust"],
        datasets: [
            {
                label: "Last Week",
                fill: true,
                backgroundColor: "rgba(179,181,198,0.2)",
                borderColor: "rgba(179,181,198,1)",
                pointBorderColor: "#fff",
                pointBackgroundColor: "rgba(179,181,198,1)",
                data: [23.77,1.61,36.69,24.62,9.82]
            }, {
                label: "This Week",
                fill: true,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                pointBorderColor: "#fff",
                pointBackgroundColor: "rgba(255,99,132,1)",
                pointBorderColor: "#fff",
                data: [25.48,54.16,7.61,8.06,4.45]
            }
        ]
    },
    options: {
        title: {
            display: true,
            text: 'Mood Analysis'
        }
    }
});