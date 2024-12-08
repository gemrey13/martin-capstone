<?php
include('../components/header.php');
?>

<?php
include('../components/sidebar.php');
?>

<?php
include('../components/navbar.php');
?>

<link rel="stylesheet" href="analytics.css">

<div class="main-content">
    <main>
        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h2>Analytics</h2>
                    </div>
                    <div class="chart-container">
                        <h3 class="chart-header">Approved Organizations Every Year</h3>
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const ctx = document.getElementById('myPieChart').getContext('2d');
                            const data = {
                                labels: ['Faith-Base', 'Community-Base', 'School-base', 'Federationn'],
                                datasets: [{
                                    label: 'Numbers of Approved Organizations Every Year',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            };

                            const config = {
                                type: 'bar',
                                data: data,
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(tooltipItem) {
                                                    return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                                }
                                            }
                                        }
                                    }
                                }
                            };

                            const myPieChart = new Chart(ctx, config);
                        });
                    </script>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include('../components/footer.php'); ?>