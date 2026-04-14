<?php

function getStockStatus(int $quantity): string 
{
    if ($quantity <= 0) {
        return 'Out of stock';
    } elseif ($quantity <= 2) {
        return 'Low stock';
    }
    return 'Available';
}

function formatSupplyName(string $name): string 
{
    return mb_strtoupper($name, 'UTF-8');
}

function getTotalQuantity(array $supplies): int 
{
    return array_reduce($supplies, function ($carry, $item) {
        return $carry + $item['quantity'];
    }, 0);
}

function getAvailableSupplies(array $supplies): array 
{
    return array_values(array_filter($supplies, function ($item) {
        return $item['quantity'] > 0;
    }));
}