<h1>Analysis View Dummy</h1>  
This is primarily for testing the communication between the Python ML and the Analysis View page for Reme. Doesn't exactly follow the styling (as that is less important and handled by CSS anyway), and uses Bootstrap 5 for ease of editing the HTML side of things.  

<h2>Requirements</h2>

- PHP version 7.1 or higher
- MySQL

<h2>Important Session Variables</h2>

| Variable Name       | Type      | Description                                                       |
|---------------------|-----------|-------------------------------------------------------------------|
| `data_variables`    | **Array** | Stores the data from the variables form at the top of `index.php` |
| `error_variables`   | **Array** | Errors relating to the variables form at the top of `index.php`   |
| `last_regeneration` | **Int**   | Records the time the Session ID was last regenerated.             |

<h3>Members of `data_variables` Array</h3>

| Variable Name       | Type       | Description                                                                                                             |
|---------------------|------------|-------------------------------------------------------------------------------------------------------------------------|
| `python_url`        | **String** | The url for the python module to attempt to communicate with.                                                           |
| `observation_count` | **String** | The number of placeholder observations to generate. Is stored as a string, but should be able to be cast to an **Int**. |
| `tag_group_id`      | **String** | The ID of the placeholder generated tag group. Is stored as a string, but should be able to be cast to an **Int**.      |

<h3>Members of `error_variables` Array</h3>
These variables are only set if their associated error is present in the submitted form.

| Variable Name  | Type       | Description                                                                         |
|----------------|------------|-------------------------------------------------------------------------------------|
| `emptyInput`   | **String** | Is set if any of the required fields in the variable setup are empty.               |
| `invalidCount` | **String** | Is set if the value submitted for the Observation Count is invalid.                 |
| `invalidID`    | **String** | Is set if the value submitted for any of the IDs in the variable setup are invalid. | 
