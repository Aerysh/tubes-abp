import 'package:flutter/material.dart';

class BookmarkScreen extends StatelessWidget {
  const BookmarkScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(child: Column(children: [
        Row(
          children:[
            Padding(padding: EdgeInsets.all( 50.0)),
            Text("My Plan",style: TextStyle(fontSize: 40),),
          ]
          
        ),
        Row(
          children: [Padding(padding: EdgeInsets.all( 50.0)),Column(
            children: [
              Image.asset("lib/assets/images/mal-phinisi.jpg", height: 150, width: 140, )
              
            ],
          ),
          Column(
            children: [
              Text("Mal Phinisi Poin", style: TextStyle(fontSize:15, fontWeight: FontWeight.bold,))
            ],
          )],
        )
        
      
      ],),
      ),
      
    );
  }
}
