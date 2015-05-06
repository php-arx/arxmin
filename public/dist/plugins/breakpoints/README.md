# Breakpoints.js

Define breakpoints for your responsive/adaptive web and Breakpoints.js will be aware of browser resize event when entering or exiting a concrete size, adding a class named with the breakpoint you defined previously within the DOM element you want.

This is a fork from the original [Breakpoint.js created by XOXCO](https://github.com/xoxco/breakpoints)

## Changes

Instead of having an interval checking for browser size changes, this fork uses the resize event over $(window). In addition, the size will be checked at the very beginning of the page load so there's no need to fire a manual resize or wait for a first resize to know which is the active breakpoint.

Additionally, you can configure which is the prefix for the breakpoint class and also where it will be added in the DOM by selecting a target.

## Instructions

```javascript
  $(window).setbreakpoints({
    // Only the largest breakpoint will be added if true
    // All the breakpoints classes will be added if false
    distinct: true,
    // The prefix that will preceed the breakpoint number and turned into a class
    // Final class structure: prefix-breakpoint
    prefix: 'breakpoints',
    // The DOM element where the formed class will be added
    target: 'body',
    // Array of widths in pixels where breakpoints should be triggered
    breakpoints: [
      1,
      320,
      480,
      768,
      1024
    ]
  });
```

<sub>Note: The '1' breakpoint is added as an example for a reason. If you want to have always a 'breakpoint-N' class in your selected DOM element (body as default) you'll need to add it so the first size detection will always respond correctly with the class addition because there's no way to have a < 1px wide browser.</sub>

## MIT License

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
