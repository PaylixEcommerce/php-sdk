<?php

require_once "src/Paylix.php";

// pass <MERCHANT_NAME> only if you need to be authenticated as an additional store

$paylix = new \Paylix\PhpSdk\Paylix("<MERCHANT_API_KEY>", "<MERCHANT_NAME>");

paylix_test_sdk($paylix, [
  "blacklists",
  "whitelists",
  "categories",
  "groups",
  "coupons",
  "feedback",
  "orders",
  "products",
  "queries",
  "payments",
  "subscriptions",
  "customers"
]);