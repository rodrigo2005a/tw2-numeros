<form action="./index.php" method="post" class="generator-form">
    <h2>Configuración</h2>
    <div class="form-group">
        <label for="n">Cantidad de números (n)</label>
        <input type="number" id="n" name="n" value="<?php echo isset($n) ? htmlspecialchars($n, ENT_QUOTES, 'UTF-8') : ''; ?>" min="1" max="1000" required placeholder="1-1000">
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="min">Valor mínimo</label>
            <input type="number" id="min" name="min" value="<?php echo isset($min) ? htmlspecialchars($min, ENT_QUOTES, 'UTF-8') : ''; ?>" placeholder="Opcional">
        </div>
        <div class="form-group">
            <label for="max">Valor máximo</label>
            <input type="number" id="max" name="max" value="<?php echo isset($max) ? htmlspecialchars($max, ENT_QUOTES, 'UTF-8') : ''; ?>" placeholder="Opcional">
        </div>
    </div>
    <button type="submit" class="btn-generate">Generar Números</button>
</form>

<style>
.generator-form {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    max-width: 500px;
    margin: 0 auto 2rem;
}
.generator-form h2 {
    color: white;
    margin: 0 0 1.5rem;
    text-align: center;
    font-size: 1.5rem;
}
.form-group {
    margin-bottom: 1rem;
}
.form-row {
    display: flex;
    gap: 1rem;
}
.form-row .form-group {
    flex: 1;
}
.generator-form label {
    display: block;
    color: rgba(255,255,255,0.9);
    margin-bottom: 0.5rem;
    font-weight: 500;
}
.generator-form input {
    width: 100%;
    padding: 0.75rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    background: rgba(255,255,255,0.95);
    box-sizing: border-box;
}
.generator-form input:focus {
    outline: 2px solid #ffd700;
    outline-offset: 2px;
}
.btn-generate {
    width: 100%;
    padding: 1rem;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 1.1rem;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
    margin-top: 0.5rem;
}
.btn-generate:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(245,87,108,0.4);
}
.btn-generate:active {
    transform: translateY(0);
}
</style>