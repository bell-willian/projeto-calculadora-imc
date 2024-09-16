<?php
function imcCalculator(float $weight, float $height): string {
    $imc = $weight / ($height ** 2);
    $imcFormatted = number_format($imc, 2);
    
    if ($imc < 18.5) {
        return "Você está abaixo do peso. Seu IMC é de $imcFormatted";
    } elseif ($imc < 24.9) {
        return "Você está no peso ideal. Seu IMC é de $imcFormatted";
    } elseif ($imc < 29.9) {
        return "Você está no sobrepeso. Seu IMC é de $imcFormatted";
    } elseif ($imc < 34.9) {
        return "Você está com obesidade grau 1. Seu IMC é de $imcFormatted";
    } elseif ($imc < 39.9) {
        return "Você está com obesidade grau 2. Seu IMC é de $imcFormatted";
    } else {
        return "Você está com obesidade mórbida. Seu IMC é de $imcFormatted";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);

    if ($weight !== false && $height !== false && $height > 0) {
        echo imcCalculator($weight, $height);
    } else {
        echo "Por favor, insira valores válidos para peso e altura.";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
