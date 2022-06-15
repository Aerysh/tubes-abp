import 'dart:async';
import 'dart:convert';

import 'package:http/http.dart' as http;
import 'package:kemakassar/utils/secure_storage.dart';

class Authentication {
  final SecureStorage secureStorage = SecureStorage();

  Future<http.Response> login(String email, String password) async {
    var map = <String, dynamic>{};

    map['email'] = email;
    map['password'] = password;

    final response = await http
        .post(Uri.parse('http://192.168.8.100:8000/api/login'), body: map);

    final data = json.decode(response.body);
    secureStorage.writeSecureData('token', data['token']);

    return response;
  }

  Future<http.Response> register(
      String name, String email, String password) async {
    var map = <String, dynamic>{};

    map['name'] = name;
    map['email'] = email;
    map['password'] = password;

    final response = await http
        .post(Uri.parse('http://192.168.8.100:8000/api/register'), body: map);

    final data = json.decode(response.body);
    secureStorage.writeSecureData('token', data['token']);
    return response;
  }

  Future<http.Response> logout() async {
    final response = await http
        .post(Uri.parse('http://192.168.8.100:8000/api/logout'), headers: {
      'Authorization': 'Bearer ${SecureStorage().readSecureData('token')}'
    });

    secureStorage.deleteSecureData('token');
    return response;
  }
}
