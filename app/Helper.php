<?php

use App\Models\Billing;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Upazila;
use App\Models\Wishlist;

if (!function_exists('setting')) {
    function setting()
    {
        $setting = Setting::where('id',1)->first();
        if( $setting ){
            return $setting;
        }else{
        return false;
        }
    }
}


if (!function_exists('getSizes')) {
    function getSizes($productId)
    {
        $sizes = Size::where('product_id',$productId)->get();
        if( $sizes ){
            return $sizes;
        }else{
        return false;
        }
    }
}


if (!function_exists('getWishlists')) {
    function getWishlists($productId)
    {
        $wishlists = Wishlist::where([['user_id', auth()->user()->id], ['product_id',$productId]])->get();
        if( $wishlists ){
            return $wishlists;
        }else{
        return false;
        }
    }
}


if (!function_exists('getOBD')) {
    function getOBD($orderId)
    {
        $getOBD = Billing::where('order_id',$orderId)->first();
        if( $getOBD ){
            return $getOBD;
        }else{
        return false;
        }
    }
}


if (!function_exists('getDivision')) {
    function getDivision($id)
    {
        $getDivision = Division::where('id', $id)->first();
        if( $getDivision ){
            return $getDivision;
        }else{
        return false;
        }
    }
}


if (!function_exists('getDistrict')) {
    function getDistrict($id)
    {
        $getDistrict = District::where('id', $id)->first();
        if( $getDistrict ){
            return $getDistrict;
        }else{
        return false;
        }
    }
}


if (!function_exists('getThana')) {
    function getThana($id)
    {
        $getThana = Upazila::where('id', $id)->first();
        if( $getThana ){
            return $getThana;
        }else{
        return false;
        }
    }
}


if (!function_exists('getOrderItems')) {
    function getOrderItems($orderId)
    {
        $getOrderItems = OrderItem::with('product', 'verient')->where('order_id', $orderId)->get();
        if( $getOrderItems ){
            return $getOrderItems;
        }else{
        return false;
        }
    }
}

if (!function_exists('getGetway')) {
    function getGetway($orderId)
    {
        $getGetway = Payment::with('getway')->where('order_id', $orderId)->first();
        if( $getGetway ){
            return $getGetway;
        }else{
        return false;
        }
    }
}

if (!function_exists('getRating')) {
    function getRating($productId)
    {
        $getCount = Review::where('product_id', $productId)->count();
        $getRating = (Review::where('product_id', $productId)->sum('rating')) / ($getCount > 0 ? $getCount : 1);
        if( $getRating ){
            return round($getRating);
        }else{
            return 0;
        }
    }
}


if (!function_exists('getCategoryMenu')) {
    function getCategoryMenu()
    {
        $getCategoryMenu = Category::where('useMainMenu', 'yes')->get();
        if( $getCategoryMenu ){
            return $getCategoryMenu;
        }else{
        return false;
        }
    }
}


if (!function_exists('getSubCategories')) {
    function getSubCategories($catId)
    {
        $getSubCategories = SubCategory::where([['category_id', $catId], ['useMainMenu', 'yes']])->get();
        if( $getSubCategories ){
            return $getSubCategories;
        }else{
        return false;
        }
    }
}

if (!function_exists('shorter')) {
    function shorter($text, $chars_limit)
    {
        // Check if length is larger than the character limit
        if (strlen($text) > $chars_limit) {
            // If so, cut the string at the character limit
            $new_text = substr($text, 0, $chars_limit);
            // Trim off white space
            $new_text = trim($new_text);
            // Add at end of text ...
            return $new_text . "...";
        }
        // If not just return the text as is
        else {
            return $text;
        }
    }
}
