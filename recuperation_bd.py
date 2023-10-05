import requests

url = 'https://www.listesdemots.net/'
arg = ['mots', 'lettres','lettrespage', '.htm']
tabMot = []
minLetter = 6
maxLetter = 12

def requestOnePage(url, tab):
    r = requests.get(url)
    if r.status_code != 200:
        return False
    text = r.text
    text = text.split(" ")

    i = 0
    while not text[i].startswith('class=mt>'):
        i += 1

    j = 0
    while text[j] != "class=pg>Pages":
        j += 1
    j-=1

    text[i] = text[i].split(">")[1]
    text[j] = text[j].split("<")[0]
    text = text[i:j+1]

    for el in text:
        tab.append(el)
    return True

def requestTotal(tab, url, arg, minLetter, maxLetter):
    print("salm")
    for nbLetter in range(minLetter, maxLetter + 1):
        pageNb = 1
        sendUrl = url + arg[0] + str(nbLetter) + arg[1] + arg[3]

        while requestOnePage(sendUrl, tab):
            pageNb += 1
            sendUrl = url + arg[0] + str(nbLetter) + arg[2] + str(pageNb) + arg[3]
            print(sendUrl)


requestTotal(tabMot, url, arg, minLetter, maxLetter)
print("coucou")
print(tabMot)


