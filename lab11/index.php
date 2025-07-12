<?php
require_once 'config.php';
require_once 'includes/functions.php';

// Fetch data from database
$visitors_data = fetchDomesticVisitorsData($conn);
$tourists_data = fetchDomesticTouristsData($conn);

// Calculate totals
$visitors_total2010 = calculateTotal($visitors_data, 'year2010');
$visitors_total2011 = calculateTotal($visitors_data, 'year2011');
$tourists_total2010 = calculateTotal($tourists_data, 'year2010');
$tourists_total2011 = calculateTotal($tourists_data, 'year2011');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domestic Tourism Expenditure Analysis</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <?php include 'includes/header.php'; ?>
        
        <div class="tabs">
            <button class="tab-btn active" data-tab="visitors">Domestic Visitors</button>
            <button class="tab-btn" data-tab="tourists">Domestic Tourists</button>
            <button class="tab-btn" data-tab="comparison">Comparative Analysis</button>
        </div>
        
<!-- Domestic Visitors Tab -->
<div id="visitors" class="tab-content active">
    <div class="section">
        <h2 class="section-title"><i class="fas fa-users"></i> Domestic Visitors Expenditure</h2>
        
        <div class="data-container">
            <div class="data-table-container">
                <div class="table-header">
                    <i class="fas fa-table"></i> Expenditure by Component (RM million)
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Component</th>
                            <th>2010</th>
                            <th>2011</th>
                            <th>Growth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shopping</td>
                            <td class="highlight">8,914</td>
                            <td class="highlight">13,149</td>
                            <td class="positive">+47.5%</td>
                        </tr>
                        <tr>
                            <td>Transport</td>
                            <td class="highlight">8,098</td>
                            <td class="highlight">10,019</td>
                            <td class="positive">+23.7%</td>
                        </tr>
                        <tr>
                            <td>Food & beverages</td>
                            <td class="highlight">7,975</td>
                            <td class="highlight">9,691</td>
                            <td class="positive">+21.5%</td>
                        </tr>
                        <tr>
                            <td>Accommodation</td>
                            <td class="highlight">6,130</td>
                            <td class="highlight">5,028</td>
                            <td class="negative">-18.0%</td>
                        </tr>
                        <tr>
                            <td>Expenditure before the trip</td>
                            <td class="highlight">894</td>
                            <td class="highlight">1,097</td>
                            <td class="positive">+22.7%</td>
                        </tr>
                        <tr>
                            <td>Other activities</td>
                            <td class="highlight">2,667</td>
                            <td class="highlight">3,362</td>
                            <td class="positive">+26.1%</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background: rgba(52, 152, 219, 0.15);">
                            <td><strong>Total Expenditure</strong></td>
                            <td class="highlight">34,679</td>
                            <td class="highlight">42,346</td>
                            <td class="positive">+22.1%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="insight-cards">
                <div class="insight-card">
                    <div class="insight-header">
                        <div class="insight-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div>2011 Total Expenditure</div>
                    </div>
                    <div class="insight-value">RM 42,346M</div>
                    <div class="insight-description">
                        Total expenditure by domestic visitors in 2011, showing significant increase from 2010.
                    </div>
                </div>
                
                <!-- Additional insight cards... -->
            </div>
        </div>
        
        <div class="chart-container">
            <!-- Bar Chart -->
            <div class="chart-box">
                <div class="chart-header">
                    <div class="chart-title">Expenditure Comparison (2010 vs 2011)</div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="visitorsBarChart"></canvas>
                </div>
            </div>
            
            <!-- Pie Chart -->
            <div class="chart-box">
                <div class="chart-header">
                    <div class="chart-title">2011 Expenditure Distribution</div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="visitorsPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
        
<!-- Domestic Tourists Tab -->
<div id="tourists" class="tab-content">
    <div class="section">
        <h2 class="section-title"><i class="fas fa-passport"></i> Domestic Tourists Expenditure</h2>
        
        <div class="data-container">
            <div class="data-table-container">
                <div class="table-header">
                    <i class="fas fa-table"></i> Expenditure by Component (RM million)
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Component</th>
                            <th>2010</th>
                            <th>2011</th>
                            <th>Growth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Food & beverages</td>
                            <td class="highlight">6,448</td>
                            <td class="highlight">7,756</td>
                            <td class="positive">+20.3%</td>
                        </tr>
                        <tr>
                            <td>Transport</td>
                            <td class="highlight">6,220</td>
                            <td class="highlight">7,417</td>
                            <td class="positive">+19.2%</td>
                        </tr>
                        <tr>
                            <td>Accommodation</td>
                            <td class="highlight">6,096</td>
                            <td class="highlight">4,985</td>
                            <td class="negative">-18.2%</td>
                        </tr>
                        <tr>
                            <td>Shopping</td>
                            <td class="highlight">2,603</td>
                            <td class="highlight">3,801</td>
                            <td class="positive">+46.0%</td>
                        </tr>
                        <tr>
                            <td>Expenditure before the trip</td>
                            <td class="highlight">595</td>
                            <td class="highlight">801</td>
                            <td class="positive">+34.6%</td>
                        </tr>
                        <tr>
                            <td>Other activities</td>
                            <td class="highlight">1,722</td>
                            <td class="highlight">2,249</td>
                            <td class="positive">+30.6%</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr style="background: rgba(52, 152, 219, 0.15);">
                            <td><strong>Total Expenditure</strong></td>
                            <td class="highlight">23,684</td>
                            <td class="highlight">27,009</td>
                            <td class="positive">+14.0%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="insight-cards">
                <div class="insight-card">
                    <div class="insight-header">
                        <div class="insight-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div>2011 Total Expenditure</div>
                    </div>
                    <div class="insight-value">RM 27,009M</div>
                    <div class="insight-description">
                        Total expenditure by domestic tourists in 2011, showing steady growth from 2010.
                    </div>
                </div>
                
                <!-- Additional insight cards... -->
            </div>
        </div>
        
        <div class="chart-container">
            <!-- Bar Chart -->
            <div class="chart-box">
                <div class="chart-header">
                    <div class="chart-title">Expenditure Comparison (2010 vs 2011)</div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="touristsBarChart"></canvas>
                </div>
            </div>
            
            <!-- Pie Chart -->
            <div class="chart-box">
                <div class="chart-header">
                    <div class="chart-title">2011 Expenditure Distribution</div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="touristsPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- In the Comparative Analysis tab -->
<div id="comparison" class="tab-content">
    <div class="section">
        <h2 class="section-title"><i class="fas fa-balance-scale"></i> Comparative Analysis</h2>
        
        <div class="chart-container">
            <div class="chart-box">
                <div class="chart-header">
                    <div class="chart-title">Total Expenditure Comparison (2011)</div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="comparisonBarChart"></canvas>
                </div>
            </div>
            
            <div class="chart-box">
                <div class="chart-header">
                    <div class="chart-title">Growth Rate Comparison (2010-2011)</div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="growthChart"></canvas>
                </div>
            </div>
        </div>
        
        <div class="insight-cards">
            <div class="insight-card">
                <div class="insight-header">
                    <div class="insight-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div>Total Expenditure Difference</div>
                </div>
                <div class="insight-value">RM 15,337M</div>
                <div class="insight-description">
                    Visitors spent 56.8% more than tourists in 2011.
                </div>
            </div>
            
            <div class="insight-card">
                <div class="insight-header">
                    <div class="insight-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div>Overall Growth Rate</div>
                </div>
                <div class="insight-value">Visitors +22.1% vs Tourists +14.0%</div>
                <div class="insight-description">
                    Visitors showed 8.1 percentage points higher growth than tourists.
                </div>
            </div>
            
            <div class="insight-card">
                <div class="insight-header">
                    <div class="insight-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div>Top Growth Category</div>
                </div>
                <div class="insight-value">Shopping (Visitors +47.5%, Tourists +46.0%)</div>
                <div class="insight-description">
                    Both groups showed highest growth in shopping expenditures.
                </div>
            </div>
            
            <div class="insight-card">
                <div class="insight-header">
                    <div class="insight-icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <div>Accommodation Decline</div>
                </div>
                <div class="insight-value">Both -18%</div>
                <div class="insight-description">
                    Accommodation spending decreased similarly for both groups.
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
        
        <?php include 'includes/footer.php'; ?>
    <script src="assets/js/main.js"></script>
</body>
</html>