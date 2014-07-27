laravel-4-exchangerate
===============

[![Build Status](https://travis-ci.org/D3Catalyst/laravel-4-exchange-rate-ggl.svg?branch=master)](https://travis-ci.org/D3Catalyst/laravel-4-exchange-rate-ggl)  ![stable](http://img.shields.io/badge/stable-v%201.0.0-blue.svg)

Laravel 4 Library for calling http://rate-exchange.appspot.com/currency API.

This library provides an easy way to make the currency exchange, a much needed application in ecommerce systems.

Just install the package, add the config and it is ready to use!

Requirements
============

* PHP >= 5.3.7
* cURL Extension

Installation
============

    Add in composer.json
    "d3catalyst/l4-geoip": "dev-master"

Add the service provider and facade in your config/app.php

Service Provider

    D3Catalyst\Exchangerate\Laravel4\ServiceProviders\ExchangerateServiceProvider

Facade

    'Exchange'           => 'D3Catalyst\Exchangerate\Laravel4\Facades\Exchangerate',

Usage
=====

	- Usage with default setters

	Set initial config
		Exchange::setCurrency('DLS','EUR');

	Get exchange value / return int or float value
		Exchange::getExchangeValue();

	- Usage with independent setters

	Set country currency code from
		Exchange::setCurrencyFrom($currency);

	Set country currency code to
		Exchange::setCurrencyTo($currency);

	Set amount - number
		Exchange::setAmount($amount);

	Get exchange value / return int or float value
		Exchange::getExchangeValue();

	- Common

	Get full exchange rate information
		Exchange::getExchangeRateInfo();