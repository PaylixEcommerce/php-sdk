<?php

function paylix_test_sdk($paylix, $components = []) {
  try {
    if (!count($components) || in_array("blacklists", $components)) {
      echo "Testing blacklists\n";
      $blacklist_payload = [
        "type" => "EMAIL",
        "data" => "sample@gmail.com",
        "note" => "demo"
      ];
      $blacklist_uniqid = $paylix->create_blacklist($blacklist_payload);
      echo "  Create blacklist passed ✓\n";
      $paylix->get_blacklist($blacklist_uniqid);
      echo "  Get blacklist passed ✓\n";
      $paylix->get_blacklists();
      echo "  Get blacklists passed ✓\n";
      $paylix->update_blacklist($blacklist_uniqid, $blacklist_payload);
      echo "  Update blacklist passed ✓\n";
      $paylix->delete_blacklist($blacklist_uniqid);
      echo "  Delete blacklist passed ✓\n";
    }

    if (!count($components) || in_array("whitelists", $components)) {
      echo "Testing whitelists\n";
      $whitelist_payload = [
        "type" => "EMAIL",
        "data" => "sample@gmail.com",
        "note" => "demo"
      ];
      $whitelist_uniqid = $paylix->create_whitelist($whitelist_payload);
      echo "  Create whitelist passed ✓\n";
      $paylix->get_whitelist($whitelist_uniqid);
      echo "  Get whitelist passed ✓\n";
      $paylix->get_whitelists();
      echo "  Get whitelists passed ✓\n";
      $paylix->update_whitelist($whitelist_uniqid, $whitelist_payload);
      echo "  Update whitelist passed ✓\n";
      $paylix->delete_whitelist($whitelist_uniqid);
      echo "  Delete whitelist passed ✓\n";
    }

    if (!count($components) || in_array("categories", $components)) {
      echo "Testing categories\n";
      $category_payload = [
        "title" => "Software",
        "unlisted" => false,
        "products_bound" => [],
        "sort_priority" => 0
      ];
      $category_uniqid = $paylix->create_category($category_payload);
      echo "  Create category passed ✓\n";
      $paylix->get_category($category_uniqid);
      echo "  Get category passed ✓\n";
      $paylix->get_categories();
      echo "  Get categories passed ✓\n";
      $paylix->update_category($category_uniqid, $category_payload);
      echo "  Update category passed ✓\n";
      $paylix->delete_category($category_uniqid);
      echo "  Delete category passed ✓\n";
    }

    if (!count($components) || in_array("groups", $components)) {
      echo "Testing groups\n";
      $group_payload = [
        "title" => "Software",
        "unlisted" => false,
        "products_bound" => [],
        "sort_priority" => 0
      ];
      $group_uniqid = $paylix->create_group($group_payload);
      echo "  Create group passed ✓\n";
      $paylix->get_group($group_uniqid);
      echo "  Get group passed ✓\n";
      $paylix->get_groups();
      echo "  Get groups passed ✓\n";
      $paylix->update_group($group_uniqid, $group_payload);
      echo "  Update group passed ✓\n";
      $paylix->delete_group($group_uniqid);
      echo "  Delete group passed ✓\n";
    }

    if (!count($components) || in_array("coupons", $components)) {
      echo "Testing coupons\n";
      $coupon_payload = [
        "code" => "TESTING_COUPON",
        "discount_value" => 35,
        "max_uses" => 50,
        "products_bound" => [],
        "discount_type" => "PERCENTAGE",
        "disabled_with_volume_discounts" => true
      ];
      $coupon_uniqid = $paylix->create_coupon($coupon_payload);
      echo "  Create coupon passed ✓\n";
      $paylix->get_coupon($coupon_uniqid);
      echo "  Get coupon passed ✓\n";
      $paylix->get_coupons();
      echo "  Get coupons passed ✓\n";
      $paylix->update_coupon($coupon_uniqid, $coupon_payload);
      echo "  Update coupon passed ✓\n";
      $paylix->delete_coupon($coupon_uniqid);
      echo "  Delete coupon passed ✓\n";
    }

    if (!count($components) || in_array("feedback", $components)) {
      echo "Testing feedback\n";
      $feedback_list = $paylix->get_feedback();
      echo "  List feedback passed ✓\n";
      if ($feedback_list[0]) {
        $feedback_uniqid = $feedback_list[0]->uniqid;
        $paylix->get_feedback($feedback_uniqid);
        echo "  Get feedback passed ✓\n";
        $feedback_payload = [
          "reply" => "Testing reply"
        ];
        $paylix->reply_feedback($feedback_uniqid, $feedback_payload);
        echo "  Reply feedback passed ✓\n";
      }
    }

    if (!count($components) || in_array("orders", $components)) {
      echo "Testing orders\n";
      $orders = $paylix->get_orders();
      echo "  Get orders passed ✓\n";
      if ($orders[0]) {
        $paylix->get_order($orders[0]->uniqid);
        echo "  Get order passed ✓\n";
        $paylix->update_order($orders[0]->uniqid, [
          "gateway" => "STRIPE",
          "stripe_apm" => "ideal"
        ]);
        echo "  Update order passed ✓\n";
        $paylix->issue_order_replacement($orders[0]->uniqid, [
          "quantity" => 1,
          "product_id" => "demo"
        ]);
        echo "  Issue order replacement passed ✓\n";
        $paylix->update_custom_fields($orders[0]->uniqid, [
          "custom_fields" => [
            "user_id" => "demo"
          ]
        ]);
        echo "  Issue order replacement passed ✓\n";
      }
    }

    if (!count($components) || in_array("products", $components)) {
      echo "Testing products\n";
      $product_payload = [
        "title" => "Software Activation Keys",
        "price" => 12.5,
        "description" => "Product description example.",
        "currency" => "EUR",
        "gateways" => ["PAYPAL","STRIPE","BITCOIN"],
        "type" => "SERIALS",
        "serials" => [
          "activation-key-#1"
        ]
      ];
      $product_uniqid = $paylix->create_product($product_payload);
      echo "  Create product passed ✓\n";
      $paylix->get_product($product_uniqid);
      echo "  Get product passed ✓\n";
      $paylix->get_products();
      echo "  Get products passed ✓\n";
      $paylix->update_product($product_uniqid, $product_payload);
      echo "  Update product passed ✓\n";
      $paylix->delete_product($product_uniqid);
      echo "  Delete product passed ✓\n";
      $paylix->licensing_update_hardware_id([
        "key" => "activation-key-#1",
        "product_id" => "demo",
        "hardware_id" => "example-id"
      ]);
      $paylix->licensing_check([
        "key" => "activation-key-#1",
        "product_id" => "demo",
        "hardware_id" => "example-id"
      ]);
      echo "  Delete product passed ✓\n";
    }

    if (!count($components) || in_array("queries", $components)) {
      echo "Testing queries\n";
      $queries = $paylix->get_queries();
      echo "  Get queries passed ✓\n";
      if ($queries[0]) {
        $paylix->get_query($queries[0]->uniqid);
        echo "  Get query passed ✓\n";
        $paylix->reply_query($queries[0]->uniqid, [
          "reply" => "this is a demo reply"
        ]);
        echo "  Reply query passed ✓\n";
        $paylix->close_query($queries[0]->uniqid);
        echo "  Close query passed ✓\n";
        $paylix->reopen_query($queries[0]->uniqid);
        echo "  Reopen query passed ✓\n";
      }
    }

    if (!count($components) || in_array("payments", $components)) {
      echo "Testing payments\n";
      $payment_payload = [
        "title" => "Paylix Payment",
        "value" => 1.5,
        "currency" => "EUR",
        "quantity" => 5,
        "email" => "no-reply@paylix.gg",
        "white_label" => false,
        "return_url" => "https://sample.paylix.gg/return"
      ];

      $payment_no_white_label = $paylix->create_payment($payment_payload);
      echo "  Create payment no white label passed ✓\n";
      $payment_payload["white_label"] = true;
      $payment_white_label = $paylix->create_payment($payment_payload);
      echo "  Create payment white label passed ✓\n";
      $paylix->delete_payment($payment_no_white_label->uniqid);
      echo "  Delete payment no white label passed ✓\n";
      $paylix->delete_payment($payment_white_label->uniqid);
      echo "  Delete payment white label passed ✓\n";
      $paylix->complete_payment($payment_white_label->uniqid);
      echo "  Complete payment white label passed ✓\n";
    }

    if (!count($components) || in_array("customers", $components)) {
      echo "Testing customers\n";
      $customer_payload = [
        "email" => "sample@gmail.com",
        "name" => "James",
        "surname" => "Smith",
        "phone" => "3287261000",
        "phone_country_code" => "IT",
        "country_code" => "IT",
        "street_address" => "St. Rome 404",
        "additional_address_info" => null,
        "city" => "Rome",
        "postal_code" => "0",
        "state" => "Italy"
      ];
      $customer_id = $paylix->create_customer($customer_payload);
      echo "  Create customer passed ✓\n";
      $paylix->get_customer($customer_id);
      echo "  Get customer passed ✓\n";
      $paylix->get_customers();
      echo "  Get customers passed ✓\n";
      $paylix->update_customer($customer_id, $customer_payload);
      echo "  Update customer passed ✓\n";
    }

    if (!count($components) || in_array("subscriptions", $components)) {
      echo "Testing subscriptions\n";
      $subscription_payload = [
        "product_id" => "61a8de6277597",
        "coupon_code" => null,
        "custom_fields" => [
          "user_id" => "demo"
        ],
        "customer_id" => "cst_4a30a219a9d7663fdd35",
        "gateway" => null
      ];
      $paylix->create_subscription($subscription_payload);
      echo "  Create subscription passed ✓\n";;
      $paylix->get_subscriptions();
      echo "  Get subscriptions passed ✓\n";
    }
  } catch (PaylixException $e) {
    echo $e->__toString();
  }
}

?>