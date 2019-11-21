<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 <field name="title_t" type="string" indexed="false" stored="false" required="false" multiValued="true" docValues="true"/>
  <field name="copies_i" type="string" indexed="false" stored="false" required="false" multiValued="true" docValues="true"/>
  <field name="cat_ss" type="string" indexed="false" stored="false" required="false" multiValued="true" docValues="true"/>
  <field name="author_s" type="string" indexed="false" stored="false" required="false" multiValued="true" docValues="true"/>



curl -X POST -H 'Content-Type: application/json' 'http://localhost:8983/solr/d8/update' --data-binary '
[
  
  {
    "id": "5",
    "ss_title": "Doc 5 updated"
  }
]'


curl -X POST -H 'Content-Type: application/json' 'http://localhost:8983/solr/d8/update' --data-binary '
{
  "add": {
    "doc": {
     "id": "3",
     "ss_title": "Doc 3 "  
    }
  },
  "add": {
    "commitWithin": 5000, 
    "overwrite": false,  
    "doc": {
      "id": "4",
      "ss_title": "Doc 4"
    }
  },

  "commit": {},
  "optimize": { "waitSearcher":false },

  "delete": { "id":"1" }, 
   
}'




Adding a Single JSON Document using curl

curl -X POST -H 'Content-Type: application/json' 'http://localhost:8983/solr/d8/update/json/docs' --data-binary '
{
  "id": "1",
  "title": "Doc 1"
}'

Adding Multiple JSON Documents  using curl 

curl -X POST -H 'Content-Type: application/json' 'http://localhost:8983/solr/my_collection/update' --data-binary '
[
  {
    "id": "1",
    "title": "Doc 1"
  },
  {
    "id": "2",
    "title": "Doc 2"
  }
]'


Updating  a Single JSON Document using curl

curl -X POST -H 'Content-Type: application/json' 'http://localhost:8983/solr/d8/update/json/docs' --data-binary '
{
  "id": "1",
  "title": "Doc 1 updated"
}'


Add and Delete using curl

curl -X POST -H 'Content-Type: application/json' 'http://localhost:8983/solr/my_collection/update' --data-binary '
{
  "add": {
    "doc": {
      "id": "DOC1",
      "my_field": 2.3,
      "my_multivalued_field": [ "aaa", "bbb" ]   
    }
  },
  "add": {
    "commitWithin": 5000, 
    "overwrite": false,  
    "doc": {
      "f1": "v1", 
      "f1": "v2"
    }
  },

  "commit": {},
  "optimize": { "waitSearcher":false },

  "delete": { "id":"ID" },  
  "delete": { "query":"QUERY" } 
}'


Delete Document using curl 

curl -X POST -H 'Content-Type: application/json' 'http://localhost:8983/solr/my_collection/update' --data-binary '
{
  
  "delete": { "id":"ID" },  

}'