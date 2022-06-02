import 'package:flutter/material.dart';

class Discover {
  final String image;
  final String title;

  const Discover(this.image, this.title);
}

class HomeScreen extends StatelessWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
          child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: const [
              Padding(
                padding: EdgeInsets.all(10.0),
                child: Text(
                  'Discover',
                  style: TextStyle(fontSize: 32, fontWeight: FontWeight.bold),
                ),
              ),
              Padding(
                padding: EdgeInsets.all(10.0),
                child: Icon(
                  Icons.search,
                  size: 32,
                ),
              )
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Expanded(
                child: SizedBox(
                    height: 213,
                    // TODO: ubah ke Listview.Separated dan fetch item dari API
                    child: ListView(
                      padding: const EdgeInsets.all(10.0),
                      scrollDirection: Axis.horizontal,
                      children: <Widget>[
                        Stack(
                          children: [
                            ClipRRect(
                              borderRadius: BorderRadius.circular(8.0),
                              child: Image.asset(
                                'lib/assets/images/trans-studio.webp',
                              ),
                            ),
                            Column(
                              mainAxisAlignment: MainAxisAlignment.end,
                              children: [
                                Container(
                                    padding: const EdgeInsets.all(8.0),
                                    child: const Text(
                                      'Trans Studio Makassar',
                                      style: TextStyle(
                                          color: Colors.white,
                                          fontSize: 16,
                                          fontWeight: FontWeight.bold),
                                    ))
                              ],
                            )
                          ],
                        ),
                        Stack(
                          alignment: Alignment.bottomLeft,
                          children: [
                            ClipRRect(
                              borderRadius: BorderRadius.circular(8.0),
                              child: Image.asset(
                                'lib/assets/images/mal-phinisi.jpg',
                              ),
                            ),
                            Column(
                              mainAxisAlignment: MainAxisAlignment.end,
                              children: [
                                Container(
                                    padding: const EdgeInsets.all(8.0),
                                    child: const Text(
                                      'Mal Phinisi Point',
                                      style: TextStyle(
                                          color: Colors.white,
                                          fontSize: 16,
                                          fontWeight: FontWeight.bold),
                                    ))
                              ],
                            )
                          ],
                        ),
                        Stack(
                          alignment: Alignment.bottomLeft,
                          children: [
                            ClipRRect(
                              borderRadius: BorderRadius.circular(8.0),
                              child: Image.asset(
                                'lib/assets/images/pantai-losari.jpg',
                              ),
                            ),
                            Column(
                              mainAxisAlignment: MainAxisAlignment.end,
                              children: [
                                Container(
                                    padding: const EdgeInsets.all(8.0),
                                    child: const Text(
                                      'Pantai Losari',
                                      style: TextStyle(
                                          color: Colors.white,
                                          fontSize: 16,
                                          fontWeight: FontWeight.bold),
                                    ))
                              ],
                            )
                          ],
                        ),
                      ],
                    )),
              )
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: const [
              Padding(
                padding: EdgeInsets.all(10.0),
                child: Text('Find New Places',
                    style:
                        TextStyle(fontSize: 20, fontWeight: FontWeight.bold)),
              ),
              Padding(padding: EdgeInsets.all(10.0), child: Text('Show All'))
            ],
          ),
          Container(
              padding: const EdgeInsets.all(10.0),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Column(
                    children: const [
                      Icon(
                        Icons.hotel_outlined,
                        size: 48,
                      ),
                      Text('Hotel')
                    ],
                  ),
                  Column(
                    children: const [
                      Icon(
                        Icons.nature_outlined,
                        size: 48,
                      ),
                      Text('Nature')
                    ],
                  ),
                  Column(
                    children: const [
                      Icon(
                        Icons.beach_access_outlined,
                        size: 48,
                      ),
                      Text('Beach')
                    ],
                  ),
                  Column(
                    children: const [
                      Icon(
                        Icons.museum_outlined,
                        size: 48,
                      ),
                      Text('Museum')
                    ],
                  ),
                  Column(
                    children: const [
                      Icon(
                        Icons.shopping_bag_outlined,
                        size: 48,
                      ),
                      Text('Shopping')
                    ],
                  ),
                ],
              )),
          Row(
            children: [
              Column(
                children: const [
                  Padding(
                    padding: EdgeInsets.all(10.0),
                    child: Text('Information',
                        style: TextStyle(
                            fontSize: 20, fontWeight: FontWeight.bold)),
                  )
                ],
              ),
              //  TODO: buat listview builder dengan item berdasarkan dari API
            ],
          )
        ],
      )),
    );
  }
}
