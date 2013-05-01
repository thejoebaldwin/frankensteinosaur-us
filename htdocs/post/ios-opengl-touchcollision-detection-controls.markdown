---
author: admin
comments: true
date: 2011-10-19 23:45:25
layout: post
slug: ios-opengl-touchcollision-detection-controls
title: iOS OpenGL touch/collision detection & controls
wordpress_id: 262
categories:
- iOS
- OpenGL
---

Got touch detection working - tricky because the screen (touch) coordinates are different than the OpenGL world coordinates, and will change according to the z coordinates. i added the slider to adjust the z value to test it (delegates? reference outlet? What?). Added a label to get the x, y coordinates of where the touch happened. Also added a vector_x, vector_y variable to the quad struct for movement. 


