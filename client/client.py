import requests
from config import

host = 'http://localhost:8001'

def post_random():
    try:
        response = requests.post(f'{host}/random')
        if response.status_code == 200:
            print("Response from /random:", response.json())
        else:
            print("Failed to get a valid response. Status code:", response.status_code)
    except requests.exceptions.RequestException as e:
        print(f"An error occurred: {e}")

def get_random():
    try:
        id_value = input("Enter the ID to retrieve: ")
        response = requests.get(f'{host}/get', params={'id': id_value})
        if response.status_code == 200:
            print("Response from /get:", response.json())
        else:
            print("Failed to get a valid response. Status code:", response.status_code)
    except requests.exceptions.RequestException as e:
        print(f"An error occurred: {e}")

def main():
    while True:
        print("\nMenu:")
        print("1. Send POST request to /random")
        print("2. Send GET request to /get with ID")
        print("3. Exit")

        choice = input("Enter your choice: ")

        if choice == '1':
            post_random()
        elif choice == '2':
            get_random()
        elif choice == '3':
            print("Exiting...")
            break
        else:
            print("Invalid choice. Please try again.")

if __name__ == "__main__":
    main()
