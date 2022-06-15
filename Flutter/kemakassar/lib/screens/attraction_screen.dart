import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:kemakassar/utils/services/api_service.dart';

class AttractionScreen extends StatelessWidget {
  const AttractionScreen({super.key, required this.id});

  final int id;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: Center(
          child: FutureBuilder<Attraction>(
            future: fetchAttraction(http.Client(), id),
            builder: (context, snapshot) {
              if (snapshot.hasError) {
                return const Center(
                  child: Text('An error has Occurred'),
                );
              } else if (snapshot.hasData) {
                // loop throught snapshot.data!.reviews
                // and create a list of review widgets
                List<Widget> reviewWidgets = [];
                for (var review in snapshot.data!.reviews) {
                  reviewWidgets.add(
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        const SizedBox(
                          height: 10,
                        ),
                        Text(
                          review['user']['name'],
                          style: const TextStyle(
                            fontSize: 12,
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        Text(
                            'Rating : ${review['rating'].toString()}',
                          style: const TextStyle(
                            color: Colors.grey
                          )

                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        Text(review['comment']),
                        const Divider(
                          thickness: 2.0,
                        )
                      ],
                    ),
                  );
                }

                return ListView(children: [
                  Column(
                    children: [
                      Card(
                        clipBehavior: Clip.antiAlias,
                        child: Column(
                          children: [
                            Image.network(
                              'http://192.168.8.100:8000/images/${snapshot.data!.image}',
                            ),
                            SizedBox(height: 10.0),
                            ClipRRect(
                              borderRadius: BorderRadius.circular(8.0),
                              child: Container(
                                padding: const EdgeInsets.all(10.0),
                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.spaceBetween,
                                      children: [
                                        Text(snapshot.data!.name,
                                            style: const TextStyle(
                                                fontSize: 24.0,
                                                fontWeight: FontWeight.bold)),
                                        TextButton(
                                          onPressed: () {},
                                          child: const Icon(Icons.bookmark_add,
                                              size: 30),
                                        )
                                      ],
                                    ),
                                    const SizedBox(height: 10.0),
                                    const Text('Overview',
                                        style: TextStyle(
                                            fontSize: 18.0,
                                            fontWeight: FontWeight.bold)),
                                    const SizedBox(height: 10.0),
                                    Text(
                                      snapshot.data!.description,
                                      style: const TextStyle(
                                          fontSize: 16.0,
                                          fontWeight: FontWeight.w300),
                                    )
                                  ],
                                ),
                              ),
                            )
                          ],
                        ),
                      ),
                      const SizedBox(height: 10.0),
                      Card(
                          clipBehavior: Clip.antiAlias,
                          child: Column(children: [
                            ClipRRect(
                                borderRadius: BorderRadius.circular(8.0),
                                child: Container(
                                    padding: const EdgeInsets.all(10.0),
                                    child: Column(
                                      crossAxisAlignment:
                                          CrossAxisAlignment.start,
                                      children: [
                                        Row(
                                          children: const [
                                            Text('Reviews',
                                                style: TextStyle(
                                                  fontSize: 18.0,
                                                  fontWeight: FontWeight.bold,
                                                ))
                                          ],
                                        ),
                                        Container(
                                          child: Column(
                                              children: [...reviewWidgets]),
                                        )
                                      ],
                                    )))
                          ])),
                    ],
                  )
                ]);
              } else {
                return const Center(
                  child: CircularProgressIndicator(),
                );
              }
            },
          ),
        ),
      ),
    );
  }
}
