import requests
_TOKEN = "test_token"
r = requests.post("http://localhost:8080/api/banner", data={'token': _TOKEN})
print("Server response:")
print(r.text)