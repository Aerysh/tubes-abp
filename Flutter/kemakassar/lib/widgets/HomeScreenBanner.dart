import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:kemakassar/screens/attraction_screen.dart';
import 'package:kemakassar/utils/services/api_service.dart';
import '../screens/attraction_screen.dart';

class HomeScreenBanner extends StatelessWidget {
  const HomeScreenBanner({super.key});

  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List<Discover>>(
        future: fetchDiscover(http.Client()),
        builder: (context, snapshot) {
          if (snapshot.hasError) {
            return const Center(
              child: Text('An error has Occurred'),
            );
          } else if (snapshot.hasData) {
            return DiscoverList(discover: snapshot.data!);
          } else {
            return const Center(
              child: CircularProgressIndicator(),
            );
          }
        });
  }
}

class DiscoverList extends StatelessWidget {
  const DiscoverList({super.key, required this.discover});

  final List<Discover> discover;

  @override
  Widget build(BuildContext context) {
    return ListView.separated(
      scrollDirection: Axis.horizontal,
      itemCount: discover.length,
      itemBuilder: (context, index) {
        return GestureDetector(
          onTap: () {
            Navigator.push(context, MaterialPageRoute(
              builder: (context) => AttractionScreen(id: discover[index].id),
            ));
          },
          child: Container(
              width: 300.0,
              child: Stack(
                alignment: Alignment.bottomLeft,
                children: [
                  ClipRRect(
                    borderRadius: BorderRadius.circular(8.0),
                    child: Image.network(
                      'http://192.168.8.100:8000/images/${discover[index].image}',
                      height: 250.0,
                      fit: BoxFit.cover,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      discover[index].name,
                      style: const TextStyle(
                          fontSize: 20,
                          fontWeight: FontWeight.bold,
                          color: Colors.white),
                    ),
                  ),
                ],
              )),
        );
      },
      separatorBuilder: (context, index) => const SizedBox(width: 10.0),
    );
  }
}
