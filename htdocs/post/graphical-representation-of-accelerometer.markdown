---
author: admin
comments: true
date: 2012-02-01 08:57:01
layout: post
slug: graphical-representation-of-accelerometer
title: Graphical representation of Accelerometer on iOS device
wordpress_id: 330
categories:
- iOS
- OpenGL
---

Working on an app concept that needs to graph out accelerometer data. The accelerometer is what tells your iPhone/iPad which way it is tipping, and from that information you can find out if it is moving, turning, etc. There is some noise in the data because it is SO sensitive (never knew it was that sensitive) that is making the bars a little twitchy. In order to make some meaningful decisions on how best normalize (remove the noise) the data I thought visually would be the best, just writing the numbers to labels was just too hard to interpret. My thought is that I can take the previous 3 (or n) measurements and average them out to make it a little smoother. Original code found on [Stackoverflow](http://stackoverflow.com/questions/5659534/retrieving-accelerometer-values).

[c language="++"]
- (void) viewDidLoad
{
    UIAccelerometer *accelerometer = [UIAccelerometer sharedAccelerometer];
    //the frequency of the sampling of data. This would be 12 times per second.
    accelerometer.updateInterval = 5.0f/60.0f;
    accelerometer.delegate = self;
}

-(void) accelerometer:(UIAccelerometer *) acelerometer didAccelerate:(UIAcceleration *)acceleration
{
    float xValue = acceleration.x * 10.0f;
    float yValue = acceleration.y * 10.0f;
    //adding 1 to the z value because device laying flat gives -1
    float zValue = (acceleration.z + 1) * 10.0f;
    //myQuads is an array of structures used in rendering polygons elsewhere in the code. move_x is the x translate (horizontal movement) of that polygon.
   //all 3 polygons are the same size and shape, I'm just making them move back and forth according to the values I get out of the   device
    myQuads[0].move_x = xValue;
    myQuads[1].move_x = yValue;
    myQuads[2].move_x = zValue;
}

[/c]



