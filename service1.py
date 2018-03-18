import requests

def main(TEXT_FILE, number):
    str = TEXT_FILE.replace(" ", "%20")
    url = "http://167.99.96.128/writeToFile.php?text=="+str+number
    r = requests.get(url)
    print(url)

if __name__ == "__main__":
    main()








