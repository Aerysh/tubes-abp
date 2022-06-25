import 'package:flutter/material.dart';
import 'package:kemakassar/widgets/HomeScreenBanner.dart';

import '../widgets/HomeScreenCategories.dart';
import '../screens/search_screen.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  // _HomeScreenState createState() => _HomeScreenState();
  HomeScreenState createState() => HomeScreenState();
}

class HomeScreenState extends State<HomeScreen> {
  late String name;

  @override
  void initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: SafeArea(
      child: Center(
        child: ListView(padding: const EdgeInsets.all(10.0), children: [
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              const Text('Discover',
                  style: TextStyle(
                    fontSize: 32,
                    fontWeight: FontWeight.bold,
                  )),
              TextButton(
                  style: TextButton.styleFrom(primary: Colors.black),
                  onPressed: () {
                    showDialog(
                      builder: (context) => AlertDialog(
                        title: const Text('Search'),
                        content: TextField(
                          onChanged: (val) => setState(() => name = val),
                          decoration: const InputDecoration(
                            hintText: 'Search',
                          ),
                        ),
                        actions: [
                          // TODO: implement search function
                          ElevatedButton(
                              onPressed: () {
                                Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                    builder: (context) => const SearchScreen(),
                                  ),
                                );
                              }, child: const Text('Search'))
                        ],
                      ),
                      context: context,
                    );
                  },
                  child: const Icon(
                    Icons.search,
                    size: 32,
                  ))
            ],
          ),
          const SizedBox(
            height: 10,
          ),
          Column(
            children: [
              Container(
                height: 250.0,
                width: double.infinity,
                child: const HomeScreenBanner(),
              ),
            ],
          ),
          const SizedBox(
            height: 10,
          ),
          Column(crossAxisAlignment: CrossAxisAlignment.start, children: const [
            Text('Find New Places',
                style: TextStyle(
                  fontSize: 20,
                  fontWeight: FontWeight.bold,
                )),
            SizedBox(
              height: 10,
            ),
            SizedBox(
              height: 300,
              child: HomeScreenCategories(),
            )
          ]),
        ]),
      ),
    ));
  }
}
