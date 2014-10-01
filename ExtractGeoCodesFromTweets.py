# author : chowmean
# gaurav.dev.iiitm@gmail.com
# Dated: 1st Oct 2014
# used Geopy library for extracting geocode out of addresses.

			#library consisting of Sentiment analysis and NLTK 
import json 					# library to process json
from pprint import pprint 			# library to print json 
import glob 					# library to read folder 
from collections import Counter 		# library to count frequency of words
from geopy.geocoders import GoogleV3  		# library to get the latitude and longitude of each tweet 
geolocator = GoogleV3()     			# googleV3 object
cnt=0
cnt_pos=0
cnt_none=0
datatokeep=''
texttowrite=[]
array = glob.glob("*.json")			#array consisting of list of all .json files
for arrays in array: 				# processing each file one by one
	json_data=open(arrays, 'r')		#open particular file
	data = json.load(json_data)						#load json data
	for datas in data:									
		loc= datas['user']['location']						#getting user location
		try:
			address, (latitude, longitude) = geolocator.geocode(loc)	#getting latitude and longitude
		
			dictionary=dict({'address':address,'latitude':latitude,'longitude':longitude})		
			texttowrite.append(dictionary)					#appending to texttowrite variable 
			print latitude
			print longitude
		except:
			print "location skipped"
	json_data.close()



file = open("location.json", "w")
file.write(json.dumps(texttowrite))						#writing location in location files
file.close()					


