<?php
function categoryMultiplier($category) {
    $category = strtolower($category);
    $map = [
        "meat"=>1.25, "seafood"=>1.18, "dairy"=>1.12, "fruits"=>1.08,
        "vegetables"=>1.05, "bakery"=>1.03, "beverages"=>0.96,
        "canned"=>0.82, "frozen"=>0.88, "pantry"=>0.86, "deli"=>1.10
    ];
    return $map[$category] ?? 1.0;
}

function forecastDemand($baseDailySales, $category, $demandIndex, $promotionFlag, $daysToExpiry) {
    $base = $baseDailySales * 7;
    $categoryBoost = categoryMultiplier($category);
    $promotionBoost = $promotionFlag ? 1.18 : 1.0;
    $expiryBoost = $daysToExpiry <= 2 ? 0.82 : ($daysToExpiry <= 5 ? 0.92 : 1.0);
    $tree1 = ($demandIndex > 1.10) ? 18 : -5;
    $tree2 = ($promotionFlag == 1) ? 14 : 0;
    $tree3 = ($daysToExpiry <= 2) ? -12 : 5;
    $tree4 = (categoryMultiplier($category) > 1.10) ? 10 : 0;
    return max(1, round(($base * $categoryBoost * $demandIndex * $promotionBoost * $expiryBoost) + $tree1 + $tree2 + $tree3 + $tree4));
}

function riskLevel($stock, $forecastDemand, $days) {
    $ratio = $forecastDemand > 0 ? $stock / $forecastDemand : $stock;
    if ($days <= 2 || $ratio >= 2) return "High";
    if ($days <= 5 || $ratio >= 1.4) return "Medium";
    return "Low";
}

function discountValue($risk, $days) {
    if ($risk == "High") return $days <= 1 ? 40 : 30;
    if ($risk == "Medium") return 15;
    return 0;
}

function aiAction($risk, $discount) {
    if ($risk == "High") return "Urgent clearance / Apply {$discount}% discount";
    if ($risk == "Medium") return "Monitor stock / Apply {$discount}% discount";
    return "Maintain current price";
}

function requireLogin() {
    if (!isset($_SESSION["user_id"])) {
        header("Location: index.php");
        exit();
    }
}

function currentUserCan($permission) {
    return isset($_SESSION[$permission]) && $_SESSION[$permission] == 1;
}

function requirePermission($permission) {
    if (!currentUserCan($permission)) {
        header("Location: no_access.php");
        exit();
    }
}
?>