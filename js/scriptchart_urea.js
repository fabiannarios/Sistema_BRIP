const ctx = document.getElementById("myChart");


const ctx1 = document.getElementById("myChart1");
const ctx2 = document.getElementById("myChart2");
const ctx3 = document.getElementById("myChart3");
const ctx4 = document.getElementById("myChart4");
const ctx5 = document.getElementById("myChart5");
const ctx6 = document.getElementById("myChart6");
const ctx7 = document.getElementById("myChart7");
const ctx8 = document.getElementById("myChart8");
const ctx9 = document.getElementById("myChart9");
const ctx10 = document.getElementById("myChart10");
const ctx11 = document.getElementById("myChart11");

fetch(" char_urea/scriptchart.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart(datos, "pie");
  });

fetch(" char_urea/scriptchart1.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart1(datos, "pie");
  });

fetch(" char_urea/scriptchart2.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart2(datos, "pie");
  });


fetch(" char_urea/scriptchart3.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart3(datos, "pie");
  });

fetch(" char_urea/scriptchart4.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart4(datos, "pie");
  });

fetch(" char_urea/scriptchart5.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart5(datos, "pie");
  });

fetch(" char_urea/scriptchart6.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart6(datos, "pie");
  });

fetch(" char_urea/scriptchart7.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart7(datos, "pie");
  });

fetch(" char_urea/scriptchart8.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart8(datos, "pie");
  });

  fetch(" char_urea/scriptchart9.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart9(datos, "pie");
  });

  fetch(" char_urea/scriptchart10.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart10(datos, "pie");
  });

  fetch(" char_urea/scriptchart11.php")
  .then((response) => {
    return response.json();
  })
  .then((datos) => {
    createChart11(datos, "pie");
  });



function createChart(chartData, type) {
  new Chart(ctx, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart1(chartData, type) {
  new Chart(ctx1, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart2(chartData, type) {
  new Chart(ctx2, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}


function createChart3(chartData, type) {
  new Chart(ctx3, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart4(chartData, type) {
  new Chart(ctx4, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart5(chartData, type) {
  new Chart(ctx5, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart6(chartData, type) {
  new Chart(ctx6, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}


function createChart7(chartData, type) {
  new Chart(ctx7, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart8(chartData, type) {
  new Chart(ctx8, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart9(chartData, type) {
  new Chart(ctx9, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart10(chartData, type) {
  new Chart(ctx10, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}

function createChart11(chartData, type) {
  new Chart(ctx11, {
    type: type,
    data: {
      labels: ["Disponibles", "Baja confiabilidad", "no disponibles"],
      datasets: [
        {
          label: "# de equipos",
          data: [
            chartData.map((row) => row.verde),
            chartData.map((row) => row.amarillo),
            chartData.map((row) => row.rojo),
          ],
          borderWidth: 1,
          backgroundColor: [' #2ecc71', ' #f4d03f', ' #c0392b ']
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}
