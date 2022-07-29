<?php

// Constants for Reservation adding path
const CSV_FILE = "../src/System/Files/CSV/reservations.csv";
const XML_FILE = "../src/System/Files/XML//reservations.xml";
const JSON_FILE = "../src/System/Files/JSON//reservations.json";

// Constants for RabbitMQ connection
const PRODUCER_HOST = "localwsl.com";
const CONSUMER_HOST = "localhost";
const PORT = 5672;
const PASSWORD = "rabbitmq";
const USERNAME = "rabbitmq";