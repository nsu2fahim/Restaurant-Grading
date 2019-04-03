from bs4 import BeautifulSoup
from selenium import webdriver
from time import sleep
import csv
import string
from selenium.webdriver.common.keys import Keys


options = webdriver.ChromeOptions()
options.add_argument('headless')

driver = webdriver.Chrome(executable_path='driver/chromedriver_mac', chrome_options=options)

areas = ['Uttara', 'Mirpur']
# areas = ['Gulshan']

url = 'http://harriken.com/'
main_window = ''

def get_phone_address(address):
    # driver.find_element_by_tag_name('body').send_keys(Keys.COMMAND + 't')
    driver.find_element_by_tag_name('body').send_keys(Keys.CONTROL + 't')
    driver.get(address)
    sleep(1.5)
    html = driver.page_source
    soup = BeautifulSoup(html, features="lxml")
    address = soup.findAll("div", class_="content__semi__body")[3].text
    address = address.strip()
    phone = soup.find_all("a", class_="link__secondary")[2].text

    try:
        val = int(phone)
        phone = val
    except ValueError:
        phone = ''

    driver.find_element_by_tag_name('body').send_keys(Keys.CONTROL + 'w')
    return (phone, address)


def extract_features(page_source, loc):
    html = driver.page_source
    soup = BeautifulSoup(html, features="lxml")
    lis = soup.findAll("li", class_="list__collection__item")
    for li in lis:
        restaurant_link = li.findAll("a")[0]
        restauran_rating = 0.0
        if(restaurant_link.has_attr('href')):
            restaurant_link = restaurant_link['href']
            restaurant_name = li.findAll("h4", class_="list__collection__item__hl")[0].text
            restaurant_type = li.findAll("span", class_="list__collection__item__info")[0].text
            restaurant_location = loc
            restaurant_thumbnail = li.findAll("figure", class_="list__collection__item__fig")[0]['style']
            ii = restaurant_thumbnail.find('("')
            jj = restaurant_thumbnail.find('")')

            restaurant_thumbnail = restaurant_thumbnail[ii + len("('") : jj]

            if(li.findAll("span", class_="list__collection__item__badge badge badge--secondary")):
                restauran_rating = float(li.findAll("span", class_="list__collection__item__badge badge badge--secondary")[0].text)
            
            restaurant_name = ''.join(x for x in restaurant_name if x in string.printable)
            # print(restaurant_name)
            # print(restaurant_type)
            # print(restaurant_location)
            # print(restaurant_link)
            # print(restaurant_thumbnail)
            # print(restauran_rating)
            
            # print('-------')

            restaurant_phone, restaurant_address = get_phone_address(restaurant_link)
            result = (restaurant_name, restaurant_type, restaurant_location, restaurant_link, restaurant_thumbnail
            , restauran_rating, restaurant_phone, restaurant_link)

            with open('restaurant_data_file.csv', mode='a') as res_file:
                csv_writer = csv.writer(res_file, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
                csv_writer.writerow([result[0], result[1], result[2], result[3], result[4], result[5], restaurant_phone, restaurant_address])



for area in areas:
    url = 'http://harriken.com/search?q=&l='+ area +'#!page=1'
    driver.get(url)
    sleep(1)
    html = driver.page_source
    extract_features(html, area)
    soup = BeautifulSoup(html, features="lxml")
    total_pages = int(soup.findAll("span", class_="total-page")[0].text)


    for i in range(2, total_pages + 1):
        url = 'http://harriken.com/search?q=&l='+ area +'#!page=' + str(i)
        driver.get(url)
        sleep(2)
        driver.refresh()
        sleep(1)
        extract_features(driver.page_source, area)


# driver.save_screenshot("screenshot.png")