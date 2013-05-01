---
author: admin
comments: true
date: 2011-10-15 13:37:41
layout: post
slug: objective-c-and-arrays-of-vertices
title: Objective C and Arrays of Vertices
wordpress_id: 257
categories:
- iOS
- OpenGL
---

Originally attempted to create an 2D array of GLFloats, but the pointers scared me off. Instead, created a Quad struct that has an array (12 vertices) that I feed into a Triangle strip. I can then make an array of Quads with a for loop and then iterate through THAT array later to draw them (and increment the RGB values too):
![](/resources/post_images/ios_opengl_arrays.png)
