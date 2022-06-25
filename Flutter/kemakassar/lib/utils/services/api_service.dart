import 'dart:async';
import 'dart:convert';

import 'package:flutter/foundation.dart';
import 'package:http/http.dart' as http;

import '../secure_storage.dart';

final SecureStorage secureStorage = SecureStorage();

class Discover {
  final int id;
  final String name;
  final String description;
  final String address;
  final String categories;
  final String image;

  const Discover({
    required this.id,
    required this.name,
    required this.description,
    required this.address,
    required this.categories,
    required this.image,
  });

  factory Discover.fromJson(Map<String, dynamic> json) {
    return Discover(
        id: json['id'] as int,
        name: json['name'] as String,
        description: json['description'] as String,
        address: json['address'] as String,
        categories: json['categories'] as String,
        image: json['images'][0]['image'] as String);
  }
}

Future<List<Discover>> fetchDiscover(http.Client client) async {
  final token = secureStorage.readSecureData('token');
  String userToken = "";
  await token.then((value) {
    userToken = value;
  });

  final response = await client.get(
      Uri.parse('http://192.168.8.100:8000/api/wisata/discover'),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $userToken',
      });

  return compute(parseDiscover, response.body);
}

List<Discover> parseDiscover(String responseBody) {
  final parsed = json.decode(responseBody).cast<Map<String, dynamic>>();

  return parsed.map<Discover>((json) => Discover.fromJson(json)).toList();
}

class Attraction {
  final int id;
  final String name;
  final String description;
  final String address;
  final String image;
  final List reviews;

  const Attraction({
    required this.id,
    required this.name,
    required this.description,
    required this.address,
    required this.image,
    required this.reviews,
  });

  factory Attraction.fromJson(Map<String, dynamic> json) {
    return Attraction(
        id: json['data']['id'] as int,
        name: json['data']['name'] as String,
        description: json['data']['description'] as String,
        address: json['data']['address'] as String,
        image: json['data']['images'][0]['image'] as String,
        reviews: json['comments'] as List);
  }
}

Future<Attraction> fetchAttraction(http.Client client, int id) async {
  final token = secureStorage.readSecureData('token');
  String userToken = "";
  await token.then((value) {
    userToken = value;
  });
  final response = await client.get(
      Uri.parse('http://192.168.8.100:8000/api/wisata/details/$id'),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $userToken',
      });

  if (response.statusCode == 200) {
    return Attraction.fromJson(json.decode(response.body));
  } else {
    throw Exception('Failed to load post');
  }
}
