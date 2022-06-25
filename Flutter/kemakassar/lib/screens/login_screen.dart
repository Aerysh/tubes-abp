import 'package:flutter/material.dart';
import 'package:kemakassar/utils/services/auth_service.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({super.key});

  @override
  LoginScreenState createState() {
    return LoginScreenState();
  }
}

class LoginScreenState extends State<LoginScreen> {
  final _formKey = GlobalKey<FormState>();
  final auth = Authentication();

  late String email;
  late String password;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Center(
            child: Form(
                key: _formKey,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Container(
                      padding: const EdgeInsets.all(10.0),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: const [
                          Text('keMakassar',
                              style: TextStyle(
                                fontSize: 24,
                                fontWeight: FontWeight.bold,
                              )),
                          Text(
                            'Please Login to Continue',
                            style: TextStyle(
                              fontSize: 14,
                            ),
                          )
                        ],
                      ),
                    ),
                    Container(
                      padding: const EdgeInsets.all(10.0),
                      child: TextFormField(
                          onChanged: (val) => setState(() => email = val),
                          decoration: const InputDecoration(
                              icon: Icon(Icons.email_outlined),
                              labelText: 'Email'),
                          validator: (value) {
                            if (value == null || value.isEmpty) {
                              return 'Please enter your email';
                            }
                            return null;
                          }),
                    ),
                    Container(
                      padding: const EdgeInsets.all(10.0),
                      child: TextFormField(
                          onChanged: (val) => setState(() => password = val),
                          decoration: const InputDecoration(
                            icon: Icon(Icons.password_outlined),
                            labelText: 'Password',
                          ),
                          obscureText: true,
                          validator: (value) {
                            if (value == null || value.isEmpty) {
                              return 'Please enter your password';
                            }
                            return null;
                          }),
                    ),
                    Container(
                        padding: const EdgeInsets.all(10.0),
                        alignment: Alignment.centerRight,
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.end,
                          children: [
                            Padding(
                              padding: const EdgeInsets.all(3.0),
                              child: ElevatedButton(
                                onPressed: () {
                                  if (_formKey.currentState!.validate()) {
                                    ScaffoldMessenger.of(context).showSnackBar(
                                      const SnackBar(
                                          content: Text('Logging in...')),
                                    );
                                    auth
                                        .login(email, password)
                                        .then((response) {
                                      if (response.statusCode == 200) {
                                        Navigator.pushNamed(context, '/');
                                      } else {
                                        ScaffoldMessenger.of(context)
                                            .showSnackBar(
                                          const SnackBar(
                                            content: Text(
                                                'Login failed. Please try again.'),
                                          ),
                                        );
                                      }
                                    });
                                  }
                                },
                                child: const Text('Login'),
                              ),
                            ),
                          ],
                        )),
                    Container(
                        alignment: Alignment.center,
                        child: Row(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              const Text("I'm a new user."),
                              TextButton(
                                  onPressed: () {
                                    Navigator.pushNamed(context, '/register');
                                  },
                                  child: const Text('Register'))
                            ]))
                  ],
                ))));
  }
}
