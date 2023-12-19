import 'package:flutter/material.dart';

class SkillsScreen extends StatelessWidget {
  const SkillsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("Skills"),
      ),
      body: Container(
        color: Colors.black, // Set the background color to black
        padding: const EdgeInsets.all(20), // Add padding for spacing
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            // Add your skills information here as Text widgets in a Column
            _buildSkillText("Computer Skills"),
            _buildSkillText("Adaptability"),
            _buildSkillText("Decision Making Skills"),
            _buildSkillText("Critical thingking Skills"),
            _buildSkillText("Emphaty"),
            _buildSkillText("Creativity"),
          ],
        ),
      ),
    );
  }

  Widget _buildSkillText(String text) {
    return Padding(
      padding: const EdgeInsets.all(8.0),
      child: ListTile(
        leading: const Icon(
          Icons
              .star, // Use the star icon for skills (you can change this to a different icon)
          color: Colors.white,
        ),
        title: Text(
          text,
          style: const TextStyle(
            color: Colors.yellow, // Set the text color to yellow
            fontSize: 16, // Set the font size
            fontWeight: FontWeight.bold, // Set the font weight to bold
            fontStyle: FontStyle.italic, // Set the font style to italic
          ),
        ),
      ),
    );
  }
}
