// Tab functionality
document.querySelectorAll('.tab-btn').forEach(button => {
    button.addEventListener('click', () => {
        // Remove active class from all buttons and content
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
        
        // Add active class to clicked button
        button.classList.add('active');
        
        // Show corresponding content
        const tabId = button.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
    });
});

// Initialize all charts when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Visitors Bar Chart
    new Chart(document.getElementById('visitorsBarChart'), {
        type: 'bar',
        data: {
            labels: ['Shopping', 'Transport', 'Food & beverages', 'Accommodation', 'Before trip', 'Other'],
            datasets: [
                {
                    label: '2010 (RM million)',
                    data: [8914, 8098, 7975, 6130, 894, 2667],
                    backgroundColor: '#3498db'
                },
                {
                    label: '2011 (RM million)',
                    data: [13149, 10019, 9691, 5028, 1097, 3362],
                    backgroundColor: '#e74c3c'
                }
            ]
        },
        options: chartOptions('Domestic Visitors Expenditure Comparison')
    });

    // Tourists Bar Chart
    new Chart(document.getElementById('touristsBarChart'), {
        type: 'bar',
        data: {
            labels: ['Food & beverages', 'Transport', 'Accommodation', 'Shopping', 'Before trip', 'Other'],
            datasets: [
                {
                    label: '2010 (RM million)',
                    data: [6448, 6220, 6096, 2603, 595, 1722],
                    backgroundColor: '#3498db'
                },
                {
                    label: '2011 (RM million)',
                    data: [7756, 7417, 4985, 3801, 801, 2249],
                    backgroundColor: '#e74c3c'
                }
            ]
        },
        options: chartOptions('Domestic Tourists Expenditure Comparison')
    });

    // Comparison Bar Chart
    new Chart(document.getElementById('comparisonBarChart'), {
        type: 'bar',
        data: {
            labels: ['Visitors', 'Tourists'],
            datasets: [{
                label: '2011 Total Expenditure (RM million)',
                data: [42346, 27009],
                backgroundColor: ['#3498db', '#e74c3c']
            }]
        },
        options: chartOptions('Total Expenditure Comparison (2011)')
    });

    // Helper function for chart options
    function chartOptions(title) {
        return {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { labels: { color: '#ecf0f1' } },
                title: {
                    display: true,
                    text: title,
                    color: '#ecf0f1',
                    font: { size: 16 }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(255,255,255,0.1)' },
                    ticks: { color: '#ecf0f1' },
                    title: { 
                        display: true,
                        text: 'RM (million)',
                        color: '#ecf0f1'
                    }
                },
                x: {
                    grid: { color: 'rgba(255,255,255,0.1)' },
                    ticks: { color: '#ecf0f1' }
                }
            }
        };
    }
});

// In assets/js/main.js
new Chart(document.getElementById('visitorsPieChart'), {
    type: 'pie',
    data: {
        labels: ['Shopping', 'Transport', 'Food & beverages', 'Accommodation', 'Before trip', 'Other'],
        datasets: [{
            data: [13149, 10019, 9691, 5028, 1097, 3362],
            backgroundColor: [
                '#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#9b59b6', '#1abc9c'
            ],
            borderColor: 'rgba(255,255,255,0.3)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    color: '#ecf0f1',
                    font: { size: 12 }
                }
            },
            title: {
                display: true,
                text: '2011 Domestic Visitors Expenditure Distribution',
                color: '#ecf0f1',
                font: { size: 16 }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.raw || 0;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = Math.round((value / total) * 100);
                        return `${label}: RM ${value.toLocaleString()}M (${percentage}%)`;
                    }
                }
            }
        }
    }
});

// In assets/js/main.js
new Chart(document.getElementById('touristsPieChart'), {
    type: 'pie',
    data: {
        labels: ['Food & beverages', 'Transport', 'Accommodation', 'Shopping', 'Before trip', 'Other'],
        datasets: [{
            data: [7756, 7417, 4985, 3801, 801, 2249],
            backgroundColor: [
                '#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#9b59b6', '#1abc9c'
            ],
            borderColor: 'rgba(255,255,255,0.3)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    color: '#ecf0f1',
                    font: { size: 12 }
                }
            },
            title: {
                display: true,
                text: '2011 Domestic Tourists Expenditure Distribution',
                color: '#ecf0f1',
                font: { size: 16 }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.raw || 0;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = Math.round((value / total) * 100);
                        return `${label}: RM ${value.toLocaleString()}M (${percentage}%)`;
                    }
                }
            }
        }
    }
});

// In assets/js/main.js
new Chart(document.getElementById('growthChart'), {
    type: 'radar',
    data: {
        labels: ['Shopping', 'Transport', 'Food & beverages', 'Accommodation', 'Before trip', 'Other'],
        datasets: [
            {
                label: 'Visitors Growth %',
                data: [47.5, 23.7, 21.5, -18.0, 22.7, 26.1],
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                borderColor: '#3498db',
                borderWidth: 2,
                pointBackgroundColor: '#3498db'
            },
            {
                label: 'Tourists Growth %',
                data: [46.0, 19.2, 20.3, -18.2, 34.6, 30.6],
                backgroundColor: 'rgba(231, 76, 60, 0.2)',
                borderColor: '#e74c3c',
                borderWidth: 2,
                pointBackgroundColor: '#e74c3c'
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: { color: '#ecf0f1' }
            },
            title: {
                display: true,
                text: 'Growth Rate Comparison (2010-2011)',
                color: '#ecf0f1',
                font: { size: 16 }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return `${context.dataset.label}: ${context.raw}%`;
                    }
                }
            }
        },
        scales: {
            r: {
                angleLines: { color: 'rgba(255,255,255,0.1)' },
                grid: { color: 'rgba(255,255,255,0.1)' },
                pointLabels: { color: '#ecf0f1' },
                ticks: {
                    color: '#ecf0f1',
                    backdropColor: 'transparent',
                    callback: function(value) { return value + '%'; }
                }
            }
        }
    }
});