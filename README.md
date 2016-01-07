#Random String

###Installation

- ExpressionEngine 2:
  - Place the directory `random_string` in `/system/expressionengine/third_party/`.
- ExpressionEngine 3:
  - Place the directory `random_string` in `/system/user/addons/`.
  - Go to the addon manager and click "Install" next to Random String.

###Usage examples

By default Random String will output 8 characters consisting of uppercase letters, lowercase letters, and digits 0-9.

The parameters `length` and `charset` are available to customize your output.

If used, possible values for the `charset` parameter include `uppers`, `lowers`, or `digits` in a pipe-delimited format.

Snippet                                       | Sample output    |
----------------------------------------------|------------------|
`{exp:random_string}`                         | Zz2oZ2cW         |
`{exp:random_string length="16"}`             | i35J130AjjoKqKfy |
`{exp:random_string charset="uppers|digits"}` | 0HENF53E         |
