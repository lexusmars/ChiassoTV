import requests
_TOKEN = "coG8HDcz5LcdQ2pb0vFJNwx0EiLwHgZa"
r = requests.post("http://localhost:8080/api/banner", data={'token': _TOKEN})
print("Server response:")
print(r.text)