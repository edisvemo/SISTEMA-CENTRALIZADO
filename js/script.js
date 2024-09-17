// Definir una función para generar el gráfico de pastel
function generatePieChart() {
    // Capturar los valores de los filtros
    var fechaInicio = document.getElementById('fechaInicio').value;
    var fechaFin = document.getElementById('fechaFin').value;
    var codigoProducto = document.getElementById('codigoProducto').value;
    var claveSucursal = document.getElementById('claveSucursal').value;
    var nombreAgente = document.getElementById('nombreAgente').value;

    // Construir la URL con los parámetros de los filtros y un timestamp
    var timestamp = new Date().getTime();
    var url = 'generate_chart.php?fechaInicio=' + fechaInicio + '&fechaFin=' + fechaFin + '&codigoProducto=' + codigoProducto + '&claveSucursal=' + claveSucursal + '&nombreAgente=' + nombreAgente + '&timestamp=' + timestamp;

    // Realizar la solicitud Fetch al servidor
    fetch(url)
    .then(response => response.json())
    .then(data => {
        // Actualizar el gráfico con los datos recibidos del servidor
        updateChart(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Definir una función para actualizar el gráfico de pastel con nuevos datos
function updateChart(data) {
    var ctx = document.getElementById('pieChart').getContext('2d');
    if(window.myPieChart != null){
        window.myPieChart.destroy(); // Destruir el gráfico anterior para evitar duplicados
    }
    window.myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: data.labels,
            datasets: [{
                label: 'Ventas',
                data: data.values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Gráfico de Pastel de Ventas'
            },
            aspectRatio: 0.4, // Puedes ajustar el aspectRatio según tus necesidades
            layout: {
                padding: {
                    left: 20, // Espacio a la izquierda del gráfico
                    right: 20, // Espacio a la derecha del gráfico
                    top: 20, // Espacio encima del gráfico
                    bottom: 20 // Espacio debajo del gráfico
                }
            }
        }
    });
    
}

// Llamar a la función para generar el gráfico inicial
generatePieChart();

// Establecer un intervalo para actualizar el gráfico cada 60 segundos
//setInterval(generatePieChart, 60000); // 60000 milisegundos = 60 segundos
