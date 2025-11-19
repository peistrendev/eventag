// chart 2

var ctx2 = document.getElementById("chart-line").getContext("2d");

// Dynamically generate labels for the days of the current month (first 9 days to match data points)
const now = new Date();
const year = now.getFullYear();
const month = now.getMonth();
const daysInMonth = new Date(year, month + 1, 0).getDate();
const numLabels = 9; // Match the number of data points
const labels = Array.from({length: Math.min(numLabels, daysInMonth)}, (_, i) => `${i + 1}`);

// Removed unused gradients as they were purple/dark and not applied to bars.
// If you want gradient fills for bars, we can add green ones later.

new Chart(ctx2, {
  type: "bar",
  data: {
    labels: labels, // Now uses dynamic day labels (e.g., ["1", "2", ..., "9"])
    datasets: [
      {
        label: "Mobile apps",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#027014", // Dark green border
        borderWidth: 3,
        backgroundColor: "#027014", // Dark green fill for bars
        fill: true,
        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
        maxBarThickness: 6,
      },
      {
        label: "Websites",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#28a745", // Medium green border (Bootstrap green for distinction)
        borderWidth: 3,
        backgroundColor: "#28a745", // Medium green fill for bars
        fill: true,
        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
        maxBarThickness: 6,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      },
    },
    interaction: {
      intersect: false,
      mode: "index",
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
        },
        ticks: {
          display: true,
          padding: 10,
          color: "#b2b9bf",
          font: {
            size: 11,
            family: "Open Sans",
            style: "normal",
            lineHeight: 2,
          },
        },
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5],
        },
        ticks: {
          display: true,
          color: "#b2b9bf",
          padding: 20,
          font: {
            size: 11,
            family: "Open Sans",
            style: "normal",
            lineHeight: 2,
          },
        },
      },
    },
  },
});

// end chart 2