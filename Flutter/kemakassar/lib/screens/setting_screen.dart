import 'package:flutter/material.dart';
import '../utils/secure_storage.dart';

import '../utils/services/auth_service.dart';

class SettingScreen extends StatelessWidget {
  const SettingScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: Center(
          child: Column(
            children: [
              ElevatedButton(
                onPressed: () {
                  Authentication().logout();
                  Navigator.pushNamed(context, '/login');
                },
                child: const Text('Logout'),
              ),
            ],
          ),
        ),
      )
    );
  }
}
