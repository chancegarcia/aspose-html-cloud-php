## ConversionOptions

### PDFOptions
| Field             | Type  | Description                                                  | Note     |
|-------------------|-------|--------------------------------------------------------------|----------|
| **width**         | float | Width in inches                                              | Optional |
| **height**        | float | Height in inches                                             | Optional |
| **left_margin**   | float | Left margin in inches                                        | Optional |
| **right_margin**  | float | Right margin in inches                                       | Optional |
| **top_margin**    | float | Top margin in inches                                         | Optional |
| **bottom_margin** | float | Bottom margin in inches                                      | Optional |
| **jpeg_quality**  | int   | Quality in percent                                           | Optional |
| **background**    | str   | CSS background like '#FF0000'. For conversion from SVG only  | Optional |

### ImageOptions

-  for JPEG, BMP, PNG, TIFF, GIF formats

| Field             | Type | Description                                                 | Note     |
|-------------------|------|-------------------------------------------------------------|----------|
| **width**         | int  | Width in pixel                                              | Optional |
| **height**        | int  | Height in pixel                                             | Optional |
| **left_margin**   | int  | Left margin in pixel                                        | Optional |
| **right_margin**  | int  | Right margin in pixel                                       | Optional |
| **top_margin**    | int  | Top margin in pixel                                         | Optional |
| **bottom_margin** | int  | Bottom margin in pixel                                      | Optional |
| **background**    | str  | CSS background like '#FF0000'. For conversion from SVG only | Optional |

### XPSOptions
| Field             | Type  | Description                                                  | Note     |
|-------------------|-------|--------------------------------------------------------------|----------|
| **width**         | float | Width in inches                                              | Optional |
| **height**        | float | Height in inches                                             | Optional |
| **left_margin**   | float | Left margin in inches                                        | Optional |
| **right_margin**  | float | Right margin in inches                                       | Optional |
| **top_margin**    | float | Top margin in inches                                         | Optional |
| **bottom_margin** | float | Bottom margin in inches                                      | Optional |
| **background**    | str   | CSS background like '#FF0000'. For conversion from SVG only  | Optional |

### DocOptions
| Field             | Type  | Description                                                  | Note     |
|-------------------|-------|--------------------------------------------------------------|----------|
| **width**         | float | Width in inches                                              | Optional |
| **height**        | float | Height in inches                                             | Optional |
| **left_margin**   | float | Left margin in inches                                        | Optional |
| **right_margin**  | float | Right margin in inches                                       | Optional |
| **top_margin**    | float | Top margin in inches                                         | Optional |
| **bottom_margin** | float | Bottom margin in inches                                      | Optional |

### SvgOptions
| Field               | Type  | Description                                                                                             | Note     |
|---------------------|-------|---------------------------------------------------------------------------------------------------------|----------|
| **error_threshold** | float | This parameter defines maximum deviation of points to fitted curve. By default it is 30.                | Optional |
| **max_iterations**  | int   | This parameter defines number of iteration for least-squares approximation method. By default it is 30. | Optional |
| **colors_limit**    | int   | The maximum number of colors used to quantize an image. Default value is 25.                            | Optional |
| **line_width**      | float | The value of this parameter is affected by the graphics scale. Default value is 1.                      | Optional |


### MarkdownOptions
| Field       | Type | Description                                   | Note     |
|-------------|------|-----------------------------------------------|----------|
| **use_git** | bool | Use git flavor. True or False. Default false. | Optional |
