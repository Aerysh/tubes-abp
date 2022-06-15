import 'package:flutter/material.dart';

class Categories {
  final String name;
  final Icon icon;

  Categories(this.name, this.icon);

  static List<Categories> getCategories() {
    return <Categories>[
      Categories('Hotel', const Icon(Icons.hotel, size: 32)),
      Categories('Restaurant', const Icon(Icons.restaurant, size: 32)),
      Categories('Museum', const Icon(Icons.museum, size: 32)),
      Categories('Park', const Icon(Icons.park, size: 32)),
      Categories('Shopping', const Icon(Icons.shopping_cart, size: 32)),
      Categories('Sport', const Icon(Icons.directions_run, size: 32)),
      Categories('Nature', const Icon(Icons.nature_people, size: 32)),
      Categories('Culture', const Icon(Icons.local_library, size: 32)),
      Categories('Religious', const Icon(Icons.place, size: 32)),
      Categories('Other', const Icon(Icons.more, size: 32)),


    ];
  }
}

class HomeScreenCategories extends StatelessWidget {
  const HomeScreenCategories({super.key});

  @override
  Widget build(BuildContext context) {
    return GridView.builder(
      itemCount: Categories.getCategories().length,
      gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
        crossAxisCount: 5,
        childAspectRatio: 0.75,
        crossAxisSpacing: 5.0,
        mainAxisSpacing: 5.0,
      ),
      shrinkWrap: true,
      physics: const NeverScrollableScrollPhysics(),
      itemBuilder: (context, index) {
        return Column(
          children: [
            TextButton(
              onPressed: () {},
              style: TextButton.styleFrom(
                primary: Colors.black,
              ),
              child: Column(
                children: [
                  Categories.getCategories()[index].icon,
                  const SizedBox(
                    height: 8,
                  ),
                  Text(
                    Categories.getCategories()[index].name,
                    style: const TextStyle(
                      fontSize: 10,
                    ),
                  ),
                ],
              ),
            ),
          ],
        );
      },
    );
  }
}
