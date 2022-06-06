import 'package:flutter/material.dart';

class Discover {
  final String image;
  final String title;

  const Discover(this.image, this.title);
}

class Information {
  final String title;
  final String description;

  const Information(this.title, this.description);
}

class HomeScreen extends StatelessWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {

    // TODO: fetch item dari API
    final List<Discover> discoverItems = [
      const Discover('lib/assets/images/trans-studio.webp', 'Trans Studio Makassar'),
      const Discover('lib/assets/images/mal-phinisi.jpg', 'Mal Phinisi'),
      const Discover('lib/assets/images/pantai-losari.jpg', 'Pantai Losari'),
    ];

    final List<Information> informationItems = [
      const Information('Information 1', 'Lorem ipsum dolor sit amet'),
      const Information('Information 2', 'Lorem ipsum dolor sit amet'),
      const Information('Information 3', 'Lorem ipsum dolor sit amet'),
    ];

    return Scaffold(
      body: Center(
        child: SizedBox(
          height: MediaQuery.of(context).size.height,
          width: MediaQuery.of(context).size.width,
          child: ListView(

            children: [
              Column(
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
                  Container(
                      height: 215,
                      width: double.infinity,
                      child: Padding(
                          padding: const EdgeInsets.all(10.0),
                          child: Container(
                              width: 300,
                              child: ListView.separated(
                                scrollDirection: Axis.horizontal,
                                itemCount: discoverItems.length,
                                itemBuilder: (context, index) {
                                  final item = discoverItems[index];

                                  return Container(
                                      width: 300,
                                      child: Stack(
                                        alignment: Alignment.bottomLeft,
                                        children: [
                                          ClipRRect(
                                            borderRadius: BorderRadius.circular(8.0),
                                            child: Image.asset(
                                                item.image,
                                                height: 215,
                                                width: 300,
                                                fit: BoxFit.fill
                                            ),
                                          ),
                                          Padding(
                                            padding: const EdgeInsets.all(10.0),
                                            child:
                                            Text(
                                                item.title,
                                                style: const TextStyle(
                                                    fontWeight: FontWeight.bold,
                                                    fontSize: 20,
                                                    color: Colors.white
                                                )
                                            ),
                                          )
                                        ],
                                      )
                                  );
                                },
                                separatorBuilder: (context, index) => const Padding(padding: EdgeInsets.all(5.0)),
                              )
                          )
                      )
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
                    ],
                  ),
                  // TODO: fix scrolling mengikuti height listview root bukan dari container
                  Container(
                    height: 300,
                    padding: const EdgeInsets.all(10.0),
                    child: ListView.separated(
                      itemCount: informationItems.length,
                      itemBuilder: (context, index) {
                        final item = informationItems[index];

                        return ListTile(
                          title: Text(item.title),
                          subtitle: Text(item.description),
                        );
                      },
                      separatorBuilder: (context, index) => const Padding(padding: EdgeInsets.all(5.0)),
                    ),
                  )
                ],
              )
            ],
          ),
        )
      ),
    );
  }
}
