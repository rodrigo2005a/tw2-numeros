<?php
if (!isset($numbers) || !is_array($numbers) || empty($numbers)) {
    return;
}
?>
<div class="results-container">
    <h2>Resultados</h2>
    <div class="stats-summary">
        <div class="stat-box">
            <span class="stat-label">Suma</span>
            <span class="stat-value"><?php echo htmlspecialchars($stats['sum'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="stat-box">
            <span class="stat-label">Promedio</span>
            <span class="stat-value"><?php echo htmlspecialchars(number_format($stats['average'], 2), ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="stat-box">
            <span class="stat-label">Mínimo</span>
            <span class="stat-value"><?php echo htmlspecialchars($stats['min'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
        <div class="stat-box">
            <span class="stat-label">Máximo</span>
            <span class="stat-value"><?php echo htmlspecialchars($stats['max'], ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
    </div>
    <table class="results-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Número Aleatorio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($numbers as $index => $number): ?>
            <tr>
                <td><?php echo htmlspecialchars($index + 1, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($number, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
.results-container {
    max-width: 600px;
    margin: 0 auto;
}
.results-container h2 {
    color: #333;
    text-align: center;
    margin-bottom: 1.5rem;
}
.stats-summary {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}
.stat-box {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 1rem;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(102,126,234,0.3);
}
.stat-box:nth-child(2) {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.stat-box:nth-child(3) {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
.stat-box:nth-child(4) {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
}
.stat-label {
    display: block;
    color: rgba(255,255,255,0.9);
    font-size: 0.85rem;
    margin-bottom: 0.5rem;
}
.stat-value {
    display: block;
    color: white;
    font-size: 1.3rem;
    font-weight: bold;
}
.results-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}
.results-table thead {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.results-table th {
    color: white;
    padding: 1rem;
    font-weight: 600;
}
.results-table td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #eee;
}
.results-table tbody tr:hover {
    background: linear-gradient(90deg, #f8f9ff 0%, #fff 100%);
}
.results-table tbody tr:last-child td {
    border-bottom: none;
}
.results-table td:first-child {
    color: #667eea;
    font-weight: 600;
}
</style>