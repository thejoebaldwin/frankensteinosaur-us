

[Box2D](http://box2d.org/) is an open source [physics engine](http://en.wikipedia.org/wiki/Physics_engine) used in games - probably the most well known in Angry Birds. A physics engine is software that simulates physical objects and their interactions with each other, taking into account things like gravity, speed (velocity), object shape, friction, etc. The application using the physics engine can then use that data to display those simulated objects (like a box) in the correct place on your screen. A 2D engine is great for applications that run with reduced resources (like on a mobile device) because the addition of a third dimension to the calculations increases the required processing power immensely, and most mobile game apps operate in 2D anyways (right-left, up-down movement). I wanted to use it in XNA on a Windows form, this is my first attempt - I used the [C# port of Box2D](http://code.google.com/p/box2dx/). I've since found out there is a library tweaked [specifically for XNA](http://box2dxna.codeplex.com/) which I'm going to take a look at, my program starts slowing down considerably once you put more than 10 objects on the screen at once.

Note: You can't see the mouse cursor but when the blocks reload it's because I'm clicking the "Reload" button. If another block is being added to the stage it's because I am clicking on the screen and it's being added at runtime.

<iframe width="560" height="315" src="http://www.youtube.com/embed/EhdvsE_BWlQ?list=UULEgYLmvZVJkJjBDoQim8kw" frameborder="0" allowfullscreen></iframe>


