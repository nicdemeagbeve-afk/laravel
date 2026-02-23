import 'package:flutter/material.dart';

void main() {
  runApp(MonAppli());
}

class MonAppli extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Magazine',
      debugShowCheckedModeBanner: false,
      home: PageAccueil(),
    );
  }
}

class PageAccueil extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Magazine Infos'),
        centerTitle: true,
        backgroundColor: Colors.blue,
        leading: Icon(Icons.menu),
        actions: [
          Icon(Icons.search),
        ],
      ),

      body: Center(
        child: Container(
          width: 300,
          height: 300,
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(10),
          ),
          child: Image.asset(
            'assets/images/magazineInfo.jpg',
            fit: BoxFit.cover,
          ),
        ),
      ),

      floatingActionButton: ElevatedButton(
        onPressed: () {
          print("Tu as cliqué dessus");
        },
        style: ElevatedButton.styleFrom(
          backgroundColor: Colors.blue,
          padding: EdgeInsets.symmetric(horizontal: 30, vertical: 15),
        ),
        child: Text(
          'click',
          style: TextStyle(color: Colors.white, fontSize: 16),
        ),
      ),
    );
  }
}
