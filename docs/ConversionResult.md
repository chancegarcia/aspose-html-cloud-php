# Client\Invoker\Model\ConversionResult

## Properties
| Name            | Type        | Description                                                                     | Notes                                                   |
|-----------------|-------------|---------------------------------------------------------------------------------|---------------------------------------------------------|
| **code**        | **integer** | HTTP result code.                                                               |                                                         |
| **id**          | **string**  | Id of conversion.                                                               |                                                         |
| **status**      | **string**  | Conversion's status ("pending", "running", "completed", "faulted", "canceled"). |                                                         |
| **description** | **string**  | Description of error.                                                           |                                                         |
| **links**       | **array**   | Reserved.                                                                       |                                                         |
| **file**        | **string**  | Full path to the result file.                                                   | If more than one, it's a zip file with the result files |